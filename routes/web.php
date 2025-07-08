<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BankDetailController;

Route::get('/', function () {
    return view('login');
});


Route::get('/welcome', [\App\Http\Controllers\Api\BankDetailController::class, 'index']);

Route::post('/bank-details', [BankDetailController::class, 'store']);

