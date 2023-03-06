<?php

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

Route::controller(\App\Http\Controllers\Auth\AuthenticatedSessionController::class)->name('admin.')->group(function () {
    Route::get('login', 'showLoginForm')->name('showLoginForm');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->name('logout');

    Route::get('register', 'showRegisterForm')->name('showRegisterForm');
    Route::post('register', 'register');

    Route::group([
        'middleware' => 'auth.admin'
    ], function () {
        Route::get('/', function () {
            return 'admin';
        });
    });

});
