<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\VerificationCodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/admin/register_email', [AdministratorController::class, 'store'])->middleware('auth:sanctum');
Route::post('/send_verification_code', [VerificationCodeController::class, 'store']);
Route::post('/admin/register_account', [AccountController::class, 'store']);
Route::post('/login', [ApiController::class, 'login']);