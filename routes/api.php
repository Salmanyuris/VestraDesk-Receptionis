<?php

use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::post('/visits/checkin', [VisitController::class, 'checkin']);