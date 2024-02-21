<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;

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

// Route::redirect('/', '/dashboard/users');
Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth')
    ->prefix('dashboard')
    ->group(
        function () {
            Route::redirect('/dashboard', '/dashboard/users');

            Route::resource('users', App\Http\Controllers\Web\UserController::class);
            Route::resource('packages', App\Http\Controllers\Web\PackageController::class);
        }
    );


Illuminate\Support\Facades\Auth::routes();
