<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, "index"])->name("login");
Route::post('/login', [LoginController::class, "store"]);

Route::get('/register', [RegisterController::class, "index"])->name("register");
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/admin', [AdminController::class, "index"])->name("admin");
Route::get('/admin/createwatch', [AdminController::class, "createwatchget"])->name("createwatch");
Route::post('/admin/createwatch', [AdminController::class, "createwatchpost"])->name("createwatch");
Route::delete('/admin/deletewatch/{id}', [AdminController::class, "deletewatch"])->name("deletewatch");

Route::get('/admin/users', [AdminController::class, "users"])->name("users");
Route::delete('/admin/deleteuser/{user}', [AdminController::class, "deleteUser"])->name("deleteUser");
Route::post('/admin/makeadmin/{user}', [AdminController::class, "makeAdmin"])->name("makeAdmin");

Route::get('/dashboard', [DashboardController::class, "index"])->name("dashboard");

Route::post('/logout', [LogoutController::class, "index"])->name("logout");

Route::get('/watch/{watch}', [WatchController::class, "index"])->name("watch");

Route::post('/comment/{watch}', [CommentController::class, "store"])->name("comment");
Route::delete('/comment/{comment}', [CommentController::class, "delete"]);

Route::put('/user-update/{user}', [UserController::class, "update"])->name("user-update");

Route::get('/', [HomeController::class, "index"])->name("home");

