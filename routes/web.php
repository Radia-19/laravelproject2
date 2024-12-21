<?php

//use App\Http\Controllers\Auth\LoginController;
//use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskManagerController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Auth;

Route::group(['middleware'=> ['userAuth','verifyUser'] ], function () {

    Route::get('/',[TaskManagerController::class,'index'])->name('home');

    Route::get('task/create',[TaskManagerController::class,'create'])->name('task.create.show');
    Route::post('task/create',[TaskManagerController::class,'store'])->name('task.create');

    Route::get('task/edit/{id}',[TaskManagerController::class,'show'])->name('task.show');
    Route::post('task/edit/{id}',[TaskManagerController::class,'update'])->name('task.update');

    Route::get('task/edit/{id}/{status}',[TaskManagerController::class,'updateStatus'])->name('task.updateStatus');

    Route::get('task/delete/{id}',[TaskManagerController::class,'delete'])->name('task.delete');

});


//USER LOGIN REGISTER ROUTES
Route::get('/register',[UserAuthController::class,'showRegister'])->name('user.register.show');
Route::post('/register',[UserAuthController::class,'register'])->name('user.register');

Route::get('/user-verify/{userId}/{token}', [UserAuthController::class,'verifyUser'])->name('user.verify');

Route::get('/login',[UserAuthController::class,'showLogin'])->name('user.login.show');
Route::post('/login',[UserAuthController::class,'login'])->name('user.login');
Route::get('/logout', [UserAuthController::class,'logout'])->name('logout');

Route::get('social-login/google',[UserAuthController::class,''])->name('');


//Admin LOGIN REGISTER ROUTES
// Route::group(['middleware'=> ['adminAuth','verifyAdmin'] ], function () {
//     Route::get('/register',[UserAuthController::class,'showRegister'])->name('admin.register.show');
//     Route::post('/register',[UserAuthController::class,'adminRegister'])->name('admin.register');

//     Route::get('/user-verify/{userId}/{token}', [UserAuthController::class,'verifyAdmin'])->name('admin.verify');

//     Route::get('/login',[UserAuthController::class,'showLogin'])->name('admin.login.show');
//     Route::post('/login',[UserAuthController::class,'adminLogin'])->name('admin.login');
//     Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');
// });









//Auth::routes();

