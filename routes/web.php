<?php

//use App\Http\Controllers\Auth\LoginController;
//use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskManagerController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Auth;

//Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::get('/',[TaskManagerController::class,'index'])->name('home');

Route::get('task/create',[TaskManagerController::class,'create'])->name('task.create.show');
Route::post('task/create',[TaskManagerController::class,'store'])->name('task.create');

Route::get('task/edit/{id}',[TaskManagerController::class,'show'])->name('task.show');
Route::post('task/edit/{id}',[TaskManagerController::class,'update'])->name('task.update');
Route::get('task/edit/{id}/{status}',[TaskManagerController::class,'updateStatus'])->name('task.updateStatus');
Route::get('task/delete/{id}',[TaskManagerController::class,'delete'])->name('task.delete');

//USER LOGIN REGISTER ROUTES
Route::get('/register',[UserAuthController::class,'showRegister'])->name('user.register.show');
Route::post('/register',[UserAuthController::class,'register'])->name('user.register');

Route::get('/user-verify/{userId}/{token}', [UserAuthController::class,'verifyUser'])->name('user.verify');


Route::get('/login',[UserAuthController::class,'showLogin'])->name('user.login.show');

















//Route::post('/login', [LoginController::class, 'login']);
//Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
