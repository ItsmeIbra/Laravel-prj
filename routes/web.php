<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PayController;
use App\Models\Student;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('/etudiant', StudentController::class);
Route::get('/etudiant.create',[StudentController::class,'create']
)->name('student/create');
Route::post('/etudiant.create',[StudentController::class,'store']
)->name('etudiant/store');
Route::post('/etudiant/{id}', [StudentController::class, 'update'])->name('etudiant.update');

Route::resource('/teachers',TeacherController::class);
Route::get('/teachers.create',[TeacherController::class,'create']
)->name('teachers/create');
Route::post('/teachers.create',[TeacherController::class,'store']
)->name('teachers.store');
Route::post('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');


Route::resource('/payment',PayController::class);
Route::get('/payment.create',[PayController::class,'create']
)->name('payment/create');
Route::post('/payment.create',[PayController::class,'store']
)->name('payment.store');
Route::post('/payment/{id}', [PayController::class,'update'])->name('payment.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
Route::get('/accueil.home', [HomeController::class, 'index']);

Route::resource('/etudiant', StudentController::class);
Route::get('/etudiant.create',[StudentController::class,'create']
)->name('student/create');
Route::post('/etudiant.create',[StudentController::class,'store']
)->name('etudiant/store');
// Route::post('/etudiant/{id}', [StudentController::class, 'update'])->name('etudiant.update');

Route::resource('/teachers',TeacherController::class);
Route::get('/teachers.create',[TeacherController::class,'create']
)->name('teachers/create');
Route::post('/teachers.create',[TeacherController::class,'store']
)->name('teachers.store');
// Route::post('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');


Route::resource('/payment',PayController::class);
Route::get('/payment.create',[PayController::class,'create']
)->name('payment/create');
Route::post('/payment.create',[PayController::class,'store']
)->name('payment.store');
// Route::post('/payment/{id}', [PayController::class,'update'])->name('payment.update');


    Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/login')->name('logout');
require __DIR__.'/auth.php';
