<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use App\Models\User;

class HolidayController extends Controller
{
    public function index()
    {
        $leaveRequests = LeaveRequest::with(['user', 'leaveType'])
            ->get()
            ->map(function ($request) {
                return [
                    'id' => $request->id,
                    'employee_name' => $request->user->firstname . ' ' . $request->user->lastname,
                    'date_start' => $request->date_start,
                    'type' => $request->leaveType->name,
                    'reason' => $request->reason,
                    'status' => $request->status,
                ];
            });

        return view('holidayRequest', compact('leaveRequests'));
    }

    public function approve(Request $request, $id)
{
    $leaveRequest = LeaveRequest::findOrFail($id);
    $leaveRequest->status = '1';
    $leaveRequest->save();

    return redirect()->route('holidayRequest')->with('success', 'تم قبول طلب الأجازة بنجاح.');
}

public function reject(Request $request, $id)
{
    $leaveRequest = LeaveRequest::findOrFail($id);
    $leaveRequest->status = '2';
    $leaveRequest->save();

    return redirect()->route('holidayRequest')->with('success', 'تم رفض طلب الأجازة بنجاح.');
}

}

