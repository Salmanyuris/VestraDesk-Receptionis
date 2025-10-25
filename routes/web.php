<?php

use App\Http\Controllers\VisitController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $employees = Employee::where('status', true)->get();
    return view('kiosk', compact('employees'));
});

Route::post('/visits/checkin', [VisitController::class, 'checkin'])->name('visits.checkin');

Route::get('/about', function () {
    return view('about');
});
 
Route::get('/contact', function () {
    return view('contact');
});