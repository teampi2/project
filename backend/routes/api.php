<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ClassStudentController;
use App\Http\Controllers\ClassTeacherController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\LessonPlanController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VerificationCodeController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

//Rota Feita
Route::post('/generate_code', [VerificationCodeController::class, 'create']);

Route::post('/login', [ApiController::class, 'login']);//realiza login e cria token
Route::get('/me', [ApiController::class, 'me']);
Route::post('/logout', [ApiController::class, 'logout'])->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT']);


Route::prefix('admin')->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR'])->group(function () {
    Route::post('/register', [AdministratorController::class, 'create']);
    Route::put('/update', [AdministratorController::class, 'update']);
    Route::get('/show', [AdministratorController::class, 'show']);
    Route::get('/all_show', [AdministratorController::class, 'all']);
    Route::delete('/delete', [AdministratorController::class, 'destroy']);
});//Rotas Feitas

Route::prefix('coordinator')->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR'])->group(function () {
    Route::post('/register', [CoordinatorController::class, 'create']);//registrar email de coordenador
    Route::put('/update', [CoordinatorController::class, 'update']);//atualizar email de coordenador
    Route::get('/show', [CoordinatorController::class, 'show']);
    Route::get('/all_show', [CoordinatorController::class, 'all']);
    Route::delete('/delete', [CoordinatorController::class, 'destroy']);//deletar email de coordenador
});//Rotas Feitas

Route::prefix('monitor')->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR'])->group(function () {
    Route::post('/register', [MonitorController::class, 'create']);//registrar email de monitor
    Route::put('/update', [MonitorController::class, 'update']);//atualizar email de monitor
    Route::get('/show', [MonitorController::class, 'show']);
    Route::get('/all_show', [MonitorController::class, 'all']);
    Route::delete('/delete', [MonitorController::class, 'destroy']);//deletar email de monitor
});//Rotas Feitas

Route::prefix('student')->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT'])->group(function () {
    Route::post('/register', [StudentController::class, 'create']);//registrar email de student
    Route::put('/update', [StudentController::class, 'update']);
    Route::put('/update_name', [StudentController::class, 'update_name'])->middleware(['auth:sanctum',CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR']);
    Route::get('/show', [StudentController::class, 'show']);
    Route::get('/all_show', [StudentController::class, 'all']);
    Route::delete('/delete', [StudentController::class, 'destroy']);//deletar email de student
});//Rotas Feitas

Route::prefix('account')->group(function () {
    Route::post('/register', [AccountController::class, 'create']);
    Route::put('/update', [AccountController::class, 'update'])->middleware(['auth:sanctum',CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT']);//
    Route::get('/show', [AccountController::class, 'show'])->middleware(['auth:sanctum',CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT']);
    Route::get('/all_show', [AccountController::class, 'all'])->middleware(CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT');
    Route::delete('/delete', [AccountController::class, 'destroy'])->middleware(CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT');//
});//Rotas Feitas

Route::prefix('school')->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR'])->group(function () {
    Route::post('/register', [SchoolController::class, 'create']);
    Route::put('/update', [SchoolController::class, 'update']);
    Route::get('/show', [SchoolController::class, 'show']);
    Route::get('/all_show', [SchoolController::class, 'all']);
    Route::delete('/delete', [SchoolController::class, 'destroy']);
});//Rotas Feitas

Route::prefix('class')->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR'])->group(function () {
    Route::post('/register', [ClassesController::class, 'create']);
    Route::put('/update', [ClassesController::class, 'update']);
    Route::get('/show', [ClassesController::class, 'show'])->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT']);
    Route::get('/all_show', [ClassesController::class, 'all']);
    Route::delete('/delete', [ClassesController::class, 'destroy']);
});//Rotas Feitas

Route::prefix('classStudent')->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR'])->group(function () {
    Route::post('/register', [ClassStudentController::class, 'create']);
    Route::put('/update', [ClassStudentController::class, 'update']);
    Route::get('/showTurmasByUser', [ClassStudentController::class, 'showByTurmasForUser'])->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT']);
    Route::get('/showUsersByTurma', [ClassStudentController::class, 'showByUsersForTurma'])->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT']);
    Route::delete('/delete', [ClassStudentController::class, 'destroy']);
});//Rotas Feitas

Route::prefix('classTeacher')->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR'])->group(function () {
    Route::post('/register', [ClassTeacherController::class, 'create']);
    Route::put('/update', [ClassTeacherController::class, 'update']);
    Route::get('/showTurmasByUser', [ClassTeacherController::class, 'showByTurmasForUser']);
    Route::get('/showUsersByTurma', [ClassTeacherController::class, 'showByUsersForTurma'])->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT']);
    Route::delete('/delete', [ClassTeacherController::class, 'destroy']);
});//Rotas Feitas

Route::prefix('activity')->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR'])->group(function () {
    Route::post('/register', [ActivityController::class, 'create']);
    Route::put('/update', [ActivityController::class, 'update']);
    Route::get('/show', [ActivityController::class, 'show'])->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT']);
    Route::get('/showByTurma', [ActivityController::class, 'showByTurma'])->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT']);
    Route::delete('/delete', [ActivityController::class, 'destroy']);
});//Rotas Feitas

Route::prefix('studentActivity')->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR|STUDENT'])->group(function () {
    Route::post('/register', [ActivityController::class, 'create']);
    Route::put('/update', [ActivityController::class, 'update'])->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR']);
    Route::get('/show', [ActivityController::class, 'show']);
    Route::delete('/delete', [ActivityController::class, 'destroy']);
});//Rotas Feitas

Route::prefix('lessonPlan')->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR'])->group(function () {
    Route::post('/register', [LessonPlanController::class, 'create']);
    Route::put('/update', [LessonPlanController::class, 'update']);
    Route::get('/show', [LessonPlanController::class, 'show']);
    Route::get('/all_show', [LessonPlanController::class, 'all']);
    Route::delete('/delete', [LessonPlanController::class, 'destroy']);
});//Rotas Feitas

Route::prefix('lesson')->middleware(['auth:sanctum', CheckRole::class.':ADMINISTRATOR|COORDENATOR|MONITOR'])->group(function () {
    Route::post('/register', [LessonPlanController::class, 'create']);
    Route::put('/update', [LessonPlanController::class, 'update']);
    Route::get('/show', [LessonPlanController::class, 'show']);
    Route::get('/all_show', [LessonPlanController::class, 'all']);
    Route::delete('/delete', [LessonPlanController::class, 'destroy']);
});