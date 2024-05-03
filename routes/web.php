<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PayController;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/etudiant', StudentController::class);
Route::get('/etudiant.create',[StudentController::class,'create']
)->name('student/create');
Route::post('/etudiant.create',[StudentController::class,'store']
)->name('etudiant.store');

Route::resource('/teachers',TeacherController::class);
Route::get('/teachers.create',[TeacherController::class,'create']
)->name('teachers/create');
Route::post('/teachers.create',[TeacherController::class,'store']
)->name('teachers.store');

Route::resource('/payment',PayController::class);
Route::get('/payment.create',[PayController::class,'create']
)->name('payment/create');
Route::post('/payment.create',[PayController::class,'store']
)->name('payment.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
Route::get('/home.home', [HomeController::class, 'index']);


    Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
