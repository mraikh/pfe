<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\ApprenantController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::prefix('formateur')->middleware(['auth:sanctum', 'verified', 'role:formateur'])->group(function () {

    Route::get('/', [FormateurController::class, 'index'])->name('index');

});

Route::prefix('apprenant')->middleware(['auth:sanctum', 'verified', 'role:apprenant'])->group(function () {

    Route::get('/', [ApprenantController::class, 'index'])->name('dashboard');

});
require __DIR__.'/auth.php';
