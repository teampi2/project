<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\VerificationCodeController;
use Illuminate\Support\Facades\Route;

//Rota Feita
Route::post('/generate_code', [VerificationCodeController::class, 'create']);

Route::post('/login', [ApiController::class, 'login']);//realiza login e cria token
Route::post('/logout', [ApiController::class, 'logout'])->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT');

//Rotas Feitas
Route::prefix('admin')->middleware(['auth:sanctum','role:ADMINISTRATOR'])->group(function () {
    Route::post('/register', [AdministratorController::class, 'create']);
    Route::put('/update', [AdministratorController::class, 'update']);
    Route::get('/show', [AdministratorController::class, 'show']);
    Route::get('/all_show', [AdministratorController::class, 'all']);
    Route::delete('/delete', [AdministratorController::class, 'destroy']);
});

Route::prefix('coordenator')->middleware('role:ADMINISTRATOR')->group(function () {
    Route::post('/register', [ApiController::class, 'registerCoordenator']);//registrar email de coordenador
    Route::put('/update', [ApiController::class, 'updateCoordenator']);//atualizar email de coordenador
    Route::get('/show', [ApiController::class, 'showCoordenator']);
    Route::get('/all_show', [ApiController::class, 'allShowCoordenator']);
    Route::delete('/delete', [ApiController::class, 'deleteCoordenator']);//deletar email de coordenador
});

Route::prefix('monitor')->middleware('role:ADMINISTRATOR|COORDENATOR')->group(function () {
    Route::post('/register', [ApiController::class, 'registerMonitor']);//registrar email de monitor
    Route::put('/update', [ApiController::class, 'updateMonitor']);//atualizar email de monitor
    Route::get('/show', [ApiController::class, 'showMonitor']);
    Route::get('/all_show', [ApiController::class, 'allShowMonitor']);
    Route::delete('/delete', [ApiController::class, 'deleteMonitor']);//deletar email de monitor
});

Route::prefix('student')->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR')->group(function () {
    Route::post('/register', [ApiController::class, 'registerStudent']);//registrar email de student
    Route::put('/update', [ApiController::class, 'updateStudent']);//atualizar email de student
    Route::get('/show', [ApiController::class, 'showStudent']);
    Route::get('/all_show', [ApiController::class, 'allShowStudent']);
    Route::delete('/delete', [ApiController::class, 'deleteStudent']);//deletar email de student
});

Route::prefix('account')->group(function () {
    Route::post('/register', [ApiController::class, 'registerAccount']);
    Route::put('/update', [ApiController::class, 'updateAccount'])->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT');//
    Route::get('/show', [ApiController::class, 'showAccount'])->middleware(['auth:sanctum','role:ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT']);
    Route::get('/all_show', [ApiController::class, 'allShowAccount'])->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT');
    Route::delete('/delete', [ApiController::class, 'deleteAccount'])->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT');//
});

Route::prefix('school')->middleware('role:ADMINISTRATOR|COORDENATOR')->group(function () {
    Route::post('/register', [ApiController::class, 'registerSchool']);
    Route::put('/update', [ApiController::class, 'updateSchool']);
    Route::get('/show', [ApiController::class, 'showSchool']);
    Route::get('/all_show', [ApiController::class, 'allShowSchool']);
    Route::delete('/delete', [ApiController::class, 'deleteScholl']);
});

Route::prefix('class')->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR')->group(function () {
    Route::post('/register', [ApiController::class, 'registerClass']);
    Route::put('/update', [ApiController::class, 'updateClass']);
    Route::get('/show', [ApiController::class, 'showClass'])->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT');
    Route::get('/all_show', [ApiController::class, 'allShowClass']);
    Route::delete('/delete', [ApiController::class, 'deleteClass']);
});

Route::prefix('activity')->group(function () {
    Route::post('/register', [ApiController::class, 'registerActivity']);
    Route::put('/update', [ApiController::class, 'updateActivity']);
    Route::get('/show', [ApiController::class, 'showActivity'])->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT');
    Route::get('/all_show', [ApiController::class, 'allShowActivity'])->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT');
    Route::delete('/delete', [ApiController::class, 'deleteActivity']);
});

Route::prefix('activityComments')->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT')->group(function () {
    Route::post('/register', [ApiController::class, 'registerActivityComment']);
    Route::put('/update', [ApiController::class, 'updateActivityComment']);
    Route::get('/show', [ApiController::class, 'showActivityComment']);
    Route::get('/all_show', [ApiController::class, 'allShowActivityComment']);
    Route::delete('/delete', [ApiController::class, 'deleteActivityComment']);
});

Route::prefix('lesson')->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR')->group(function () {
    Route::post('/register', [ApiController::class, 'registerLesson']);
    Route::put('/update', [ApiController::class, 'updateLesson']);
    Route::get('/show', [ApiController::class, 'showLesson'])->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT');
    Route::get('/all_show', [ApiController::class, 'allShowLesson'])->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT');
    Route::delete('/delete', [ApiController::class, 'deleteLesson']);
});

Route::prefix('lessonComments')->middleware('role:ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT')->group(function () {
    Route::post('/register', [ApiController::class, 'registerLessonComment']);
    Route::put('/update', [ApiController::class, 'updateLessonComment']);
    Route::get('/show', [ApiController::class, 'showLessonComment']);
    Route::get('/all_show', [ApiController::class, 'allShowLessonComment']);
    Route::delete('/delete', [ApiController::class, 'deleteLessonComment']);
});

