<?php
namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\EmployeeMeta;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['employeeMeta' => function ($query) {
            $query->whereIn('meta_field', ['firstname', 'lastname', 'department_name']);
        }])->get()
        ->map(function ($attendance) {
            $employeeMeta = $attendance->employeeMeta->pluck('meta_value', 'meta_field')->toArray();
            return [
                'id' => $attendance->user_id,
                'name' => (isset($employeeMeta['firstname']) ? $employeeMeta['firstname'] : '') . ' ' . (isset($employeeMeta['lastname']) ? $employeeMeta['lastname'] : ''),
                'department' => isset($employeeMeta['department_name']) ? $employeeMeta['department_name'] : '',
                'date' => \Carbon\Carbon::parse($attendance->Day_date)->format('d/m/Y'),
                'attendance_time' => $attendance->Attendance_time->toTimeString(),
                'departure_time' => $attendance->Departure_time->toTimeString(),
            ];
        });

        return view('LeaveAttend', compact('attendances'));
    }
}



