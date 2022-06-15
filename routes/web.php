<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});


//Registration Routes
Route::get('registration', [AdminController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AdminController::class, 'customRegistration'])->name('register.custom'); 

//Login Routes
Route::get('login', [AdminController::class, 'login'])->name('login');
Route::post('custom-login', [AdminController::class, 'customLogin'])->name('login.custom'); 


//Log-Out Routes
Route::get('signout', [AdminController::class, 'signOut'])->name('signout'); 

