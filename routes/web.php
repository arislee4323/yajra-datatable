<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClasesController;
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
});

Route::get('/student',[StudentController::class, 'index']);
Route::post('/student',[StudentController::class, 'store']);
Route::get('/student/data',[StudentController::class, 'student']);
Route::get('/edit/student/{id}',[StudentController::class, 'edit']);
Route::post('/post/student/{id}',[StudentController::class, 'update']);
Route::delete('/delete/student/{id}', [StudentController::class, 'destroy']);

Route::get('/teacher',[TeacherController::class, 'index']);
Route::post('/teacher', [TeacherController::class, 'store']);
// Route::get('/edit/teacher/{id}',[TeacherController::class, 'edit']);
Route::get('/edit/teacher/{id}',[TeacherController::class, 'edit']);
Route::post('/edit/teacher/{id}',[TeacherController::class, 'update']);
Route::delete('/delete/teacher/{id}', [TeacherController::class, 'destroy']);

Route::get('/clases', [ClasesController::class, 'index']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
