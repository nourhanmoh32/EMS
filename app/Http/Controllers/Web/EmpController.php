<?php
namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeMeta;
use Illuminate\Support\Facades\Storage;

class EmpController extends Controller
{
    public function store(Request $request)
    {
        // حفظ البيانات في جدول users
        $user = new User();
        $user->firstname = $request->First_Name;
        $user->middlename = $request->Middle_Name;
        $user->lastname = $request->Last_Name;
        $user->username = $request->First_Name; // يمكن استخدام email كـ username
        $user->password = bcrypt($request->Password);

        // التعامل مع رفع الصورة
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $user->avatar = $path;
        }

        $user->save();

        // حفظ باقي البيانات في جدول employee_meta
        $meta_fields = [
            'email' => $request->Email,
            'phone' => $request->Mobile,
            'department_name' => $request->Department,
            'salary' => $request->Salary,
        ];

        foreach ($meta_fields as $field => $value) {
            $meta = new EmployeeMeta();
            $meta->user_id = $user->id;
            $meta->meta_field = $field;
            $meta->meta_value = $value;
            $meta->save();
        }

        // إعادة التوجيه إلى الصفحة الرئيسية
        return redirect('/dashboard')->with('success', 'Employee data saved successfully!');
    }

    public function index()
    {
        $users = User::all();
        $employeeMeta = EmployeeMeta::all()->groupBy('user_id');

        return view('dashboard', compact('users', 'employeeMeta'));
    }
}
