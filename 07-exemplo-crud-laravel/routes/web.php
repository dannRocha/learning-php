<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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
    return view('register');
});

Route::post('/register', [ RegisterController::class, 'save']);
Route::get('/list', [RegisterController::class, 'list']);
Route::get('/edit/{id}', [RegisterController::class, 'edit']);
Route::post('/update', [RegisterController::class, 'update']);
Route::get('/delete/{id}', [RegisterController::class, 'delete']);
