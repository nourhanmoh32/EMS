<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\AttendanceController;
use App\Http\Controllers\Web\HolidayController;
use App\Http\Controllers\Web\LeaveController;
use App\Http\Controllers\Web\EmpController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/LeaveAttend', function () {
    return view('LeaveAttend');
})->name('LeaveAttend');
Route::get('/holidayRequest', function () {
    return view('holidayRequest');
})->name('holidayRequest');

Route::get('/leaveRequest', function () {
    return view('leaveRequest');
})->name('leaveRequest');

Route::get('/emp_info', function () {
    return view('emp_info');
})->name('emp_info');


// BackEnd
Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});
Route::get('/leave-attend', [AttendanceController::class, 'index'])->name('LeaveAttend');
//holiday
Route::get('/holidayRequest', [HolidayController::class, 'index'])->name('holidayRequest');
Route::post('/holiday-request/approve/{id}', [HolidayController::class, 'approve'])->name('approveVacation');
Route::post('/holiday-request/reject/{id}', [HolidayController::class, 'reject'])->name('rejectVacation');
//Departure
Route::get('/leaveRequest', [LeaveController::class, 'index'])->name('leaveRequest');
Route::post('/leaveRequest/approve/{id}', [LeaveController::class, 'approveLeave'])->name('approveLeave');
Route::post('/leaveRequest/reject/{id}', [LeaveController::class, 'rejectLeave'])->name('rejectLeave');
//Employee_info.
Route::get('/dashboard', [EmpController::class, 'index'])->name('dashboard');;
Route::post('/employee/store', [EmpController::class, 'store'])->name('employee.store');

