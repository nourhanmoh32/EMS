<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\DepartureRequest;
use App\Models\User;
use Carbon\Carbon;

class LeaveController extends Controller
{
    public function index()
    {
        $leaveRequests = DepartureRequest::with('user')
            ->select('id', 'user_id', 'Departure_time', 'reason', 'status')
            ->get()
            ->map(function($request) {
                $request->employee_name = $request->user->firstname . ' ' . $request->user->lastname;
                $request->Departure_time = Carbon::parse($request->Departure_time)->format('H:i:s');
                return $request;
            });

        return view('leaveRequest', compact('leaveRequests'));
    }

    public function approveLeave($id)
    {
        $leaveRequest = DepartureRequest::find($id);
        if ($leaveRequest) {
            $leaveRequest->status = 1; // تم القبول
            $leaveRequest->save();
        }
        return redirect()->back();
    }

    public function rejectLeave($id)
    {
        $leaveRequest = DepartureRequest::find($id);
        if ($leaveRequest) {
            $leaveRequest->status = 2; // تم الرفض
            $leaveRequest->save();
        }
        return redirect()->back();
    }

}


