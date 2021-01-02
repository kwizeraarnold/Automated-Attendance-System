<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/login/lecturer', [LoginController::class, 'showLecturerLoginForm']);
Route::get('/login/student', [LoginController::class,'showStudentLoginForm']);
Route::get('/register/lecturer', [RegisterController::class,'showLecturerRegisterForm']);
Route::get('/register/student', [RegisterController::class,'showStudentRegisterForm']);

Route::post('/login/lecturer', [LoginController::class,'lecturerLogin']);
Route::post('/login/student', [LoginController::class,'studentLogin']);
Route::post('/register/lecturer', [RegisterController::class,'createLecturer']);
Route::post('/register/student', [RegisterController::class,'createStudent']);

Route::group(['middleware' => 'auth:lecturer'], function () {

    Route::view('/lecturer', 'lecturer');
});

Route::group(['middleware' => 'auth:student'], function () {
    Route::view('/student', 'student');
});

Route::get('logout', [LoginController::class,'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
