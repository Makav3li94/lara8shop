<?php

use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;

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



Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Admin All Routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'profile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('/admin/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
Route::get('/admin/change/password', [AdminProfileController::class, 'changePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminProfileController::class, 'updatePassword'])->name('admin.update.password');

// User All Routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/user/edit', [IndexController::class, 'edit'])->name('user.edit');
Route::post('/user/{user}/update', [IndexController::class, 'update'])->name('user.update');
Route::get('/user/edit/password', [IndexController::class, 'editPassword'])->name('user.edit.password');
Route::post('/user/{user}/update/password', [IndexController::class, 'updatePassword'])->name('user.update.password');
Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');
