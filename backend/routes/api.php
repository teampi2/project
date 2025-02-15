<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\VerificationCodeController;
use Illuminate\Support\Facades\Route;


Route::post('/generate_code', [VerificationCodeController::class, 'store']);

Route::post('/login', [ApiController::class, 'login']);//realiza login e cria token
Route::post('/logout', [ApiController::class, 'logout']);//realiza logout e destroy token

Route::prefix('admin')->group(function () {
    Route::post('/register', [ApiController::class, 'registerAdmin']);//registrar email de admin
    Route::put('/update', [ApiController::class, 'updateAdmin']);//atualizar email de admin
    Route::get('/show', [ApiController::class, 'showAdmin']);
    Route::get('/all_show', [ApiController::class, 'allShowAdmin']);
    Route::delete('/delete', [ApiController::class, 'deleteAdmin']);//deletar email de admin
});

Route::prefix('coordenator')->group(function () {
    Route::post('/register', [ApiController::class, 'registerCoordenator']);//registrar email de coordenador
    Route::put('/update', [ApiController::class, 'updateCoordenator']);//atualizar email de coordenador
    Route::get('/show', [ApiController::class, 'showCoordenator']);
    Route::get('/all_show', [ApiController::class, 'allShowCoordenator']);
    Route::delete('/delete', [ApiController::class, 'deleteCoordenator']);//deletar email de coordenador
});

Route::prefix('monitor')->group(function () {
    Route::post('/register', [ApiController::class, 'registerMonitor']);//registrar email de monitor
    Route::put('/update', [ApiController::class, 'updateMonitor']);//atualizar email de monitor
    Route::get('/show', [ApiController::class, 'showMonitor']);
    Route::get('/all_show', [ApiController::class, 'allShowMonitor']);
    Route::delete('/delete', [ApiController::class, 'deleteMonitor']);//deletar email de monitor
});

Route::prefix('student')->group(function () {
    Route::post('/register', [ApiController::class, 'registerStudent']);//registrar email de student
    Route::put('/update', [ApiController::class, 'updateStudent']);//atualizar email de student
    Route::get('/show', [ApiController::class, 'showStudent']);
    Route::get('/all_show', [ApiController::class, 'allShowStudent']);
    Route::delete('/delete', [ApiController::class, 'deleteStudent']);//deletar email de student

});

Route::prefix('account')->group(function () {
    Route::post('/register', [ApiController::class, 'registerAccount']);//
    Route::put('/update', [ApiController::class, 'updateAccount']);//
    Route::get('/show', [ApiController::class, 'showAccount']);
    Route::get('/all_show', [ApiController::class, 'allShowAccount']);
    Route::delete('/delete', [ApiController::class, 'deleteAccount']);//
});

Route::prefix('school')->group(function () {
    Route::post('/register', [ApiController::class, 'registerSchool']);
    Route::put('/update', [ApiController::class, 'updateSchool']);
    Route::get('/show', [ApiController::class, 'showSchool']);
    Route::get('/all_show', [ApiController::class, 'allShowSchool']);
    Route::delete('/delete', [ApiController::class, 'deleteScholl']);
});

Route::prefix('class')->group(function () {
    Route::post('/register', [ApiController::class, 'registerClass']);
    Route::put('/update', [ApiController::class, 'updateClass']);
    Route::get('/show', [ApiController::class, 'showClass']);
    Route::get('/all_show', [ApiController::class, 'allShowClass']);
    Route::delete('/delete', [ApiController::class, 'deleteClass']);
});

Route::prefix('lecture')->group(function () {
    Route::post('/register', [ApiController::class, 'registerLectue']);
    Route::put('/update', [ApiController::class, 'updateLecture']);
    Route::get('/show', [ApiController::class, 'showLecture']);
    Route::get('/all_show', [ApiController::class, 'allShowLecture']);
    Route::delete('/delete', [ApiController::class, 'deleteLecture']);
});

Route::prefix('activity')->group(function () {
    Route::post('/register', [ApiController::class, 'registerActivity']);
    Route::put('/update', [ApiController::class, 'updateActivity']);
    Route::get('/show', [ApiController::class, 'showActivity']);
    Route::get('/all_show', [ApiController::class, 'allShowActivity']);
    Route::delete('/delete', [ApiController::class, 'deleteActivity']);
});

Route::prefix('activityComments')->group(function () {
    Route::post('/register', [ApiController::class, 'registerActivityComment']);
    Route::put('/update', [ApiController::class, 'updateActivityComment']);
    Route::get('/show', [ApiController::class, 'showActivityComment']);
    Route::get('/all_show', [ApiController::class, 'allShowActivityComment']);
    Route::delete('/delete', [ApiController::class, 'deleteActivityComment']);
});

Route::prefix('lesson')->group(function () {
    Route::post('/register', [ApiController::class, 'registerLesson']);
    Route::put('/update', [ApiController::class, 'updateLesson']);
    Route::get('/show', [ApiController::class, 'showLesson']);
    Route::get('/all_show', [ApiController::class, 'allShowLesson']);
    Route::delete('/delete', [ApiController::class, 'deleteLesson']);
});

Route::prefix('lessonComments')->group(function () {
    Route::post('/register', [ApiController::class, 'registerLessonComment']);
    Route::put('/update', [ApiController::class, 'updateLessonComment']);
    Route::get('/show', [ApiController::class, 'showLessonComment']);
    Route::get('/all_show', [ApiController::class, 'allShowLessonComment']);
    Route::delete('/delete', [ApiController::class, 'deleteLessonComment']);
});

