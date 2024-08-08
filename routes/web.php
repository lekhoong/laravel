<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkAuth;

Route::get('/', function () {
    return view('welcome');
});



Route::get('members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('members', [MemberController::class, 'store'])->name('members.store');
Route::get('members', [MemberController::class, 'index'])->name('members.index');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login','login');
    Route::post("users/authenticate",'authenticate')->name('login');
    Route::get('/users','create');
    Route::post("/users",'store')->name('register');
    Route::post("/logout",'logout');
    Route::get("/layout",'layout');
    Route::get("/verify/{logins}",'show')->name('verify.show');
    Route::post("/verify/{logins}",'verify')->name('email.verify');
});