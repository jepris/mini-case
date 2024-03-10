<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [KursusController::class, 'index']);
Route::get('/dashboard', [KursusController::class, 'index'])->name('dashboard');
//course
Route::get('/course', [CategoryController::class, 'index']);
// bagian About
Route::get('/about', function () {
    return view('about');
});
// login
Route::get('/sesi',[UserController::class, 'index'])->name('login');
Route::post('/sesi/login',[UserController::class, 'login']);
Route::get('/sesi/logout',[UserController::class, 'logout']);
// register
Route::get('/sesi/register',[UserController::class, 'register']);
Route::post('/sesi/create',[UserController::class, 'create']);
//kursus in out
Route::post('/join/{kursusId}', [UserController::class, 'joinKursus'])->name('join.kursus')->middleware('auth');
Route::get('/kursus/{kursusId}/users', [UserController::class, 'showKursusUsers'])->name('showKursusUsers')->middleware('auth');
Route::post('/kursus/{kursus}/exitkursus', [UserController::class, 'exitkursus'])->name('exit.kursus');


// Route::resource('dashboard/kursus',AdminController::class)->except('show')->middleware('admin');
Route::resource('dashboard/kursus',AdminController::class)->except('show'); 
// Route::resource('dashboard/user',AdminUserController::class)->except('show'); 
// Route::resource('dashboard/user',AdminUserController::class)->except('show'); 
Route::get('/dashboard/user', [AdminUserController::class,'index'])->name('index');
// Route::get('/dashboard/{user}/edit', [AdminUserController::class,'edit'])->name('admin.edit');
Route::put('/dashboard/{user}', [AdminUserController::class, 'updatestatus'])->name('admin.update');