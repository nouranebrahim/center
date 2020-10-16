<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;


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

Auth::routes(['verify'=>true]);

Route::get('/courses', [ CourseController::class, 'index'])->name('courses.index')->middleware('verified'); 
Route::get('/courses/create', [ CourseController::class, 'create'])->name('courses.create');  
Route::post('/courses/store', [ CourseController::class, 'store'])->name('courses.store'); 
Route::get('/courses/edit', [ CourseController::class, 'edit'])->name('courses.edit');  
Route::post('/courses/update', [ CourseController::class, 'update'])->name('courses.update');  

Route::get('/courses/{course}', [ CourseController::class, 'show'])->name('courses.show');  
Route::delete('/courses/{course}/destroy', [ CourseController::class, 'destroy'])->name('courses.destroy');  
// ######################################################

Route::get('/users', [ UserController::class, 'index'])->name('users.index'); 
Route::get('/users/create', [ UserController::class, 'create'])->name('users.create');  
Route::post('/users/store', [ UserController::class, 'store'])->name('users.store'); 
Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');  
Route::post('/users/update', [ UserController::class, 'update'])->name('users.update');  

Route::get('/users/{user}', [ UserController::class, 'show'])->name('users.show');  
Route::delete('/users/{user}/destroy', [ UserController::class, 'destroy'])->name('users.destroy');  





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
