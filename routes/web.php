<?php

use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [ImageController::class, 'index'])->name('image');
// Route::get('create/{id?}', [ImageController::class, 'create'])->name('image.create');
// Route::post('images', [ImageController::class, 'image'])->name('image.media');
// Route::delete('images-destroy/{id?}', [ImageController::class, 'destroy'])->name('image.destroy');

// Route::group(['prefix' => '/', 'as' => 'user.backend.'], function () {
//     Route::resource('users', User\UserController::class);
// });
// Route::get('/', [User\UserController::class, 'index']);

Route::group(['as' => 'user.backend.'], function () {
    Route::get('/', [User\UserController::class, 'index'])->name('/');
    Route::resource('users', User\UserController::class);
});
