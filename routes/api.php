<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\BankDetailController;
use App\Http\Controllers\AuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('bank-details', BankDetailController::class);
Route::post('/bank-detail', [BankDetailController::class, 'store'])->name('bank-details.store');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/admin/dashboard', function () {
    $data = BankDetailController::paginate(5); // Example model
    return view('admin.dashboard', compact('data'));
})->middleware(['auth', 'admin']);

