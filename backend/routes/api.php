<?php

use App\Http\Controllers\AdministratorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/admin/register_email', [AdministratorController::class, 'store'])/*->middleware(['auth', 'can:manage-admin'])*/;