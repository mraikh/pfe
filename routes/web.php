<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\AdminController;

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
Route::get('/admin',function (){
    return view('admin.index');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/courses', [CourController::class, 'cours'])->name('courses');

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::prefix('formateur')->name('formateur.')->middleware(['auth:sanctum', 'verified', 'role:formateur'])->group(function () {

    Route::get('/', [FormateurController::class, 'index'])->name('index');
    Route::get('/profile', [FormateurController::class, 'profile'])->name('profile');
    Route::get('/formations', [FormationController::class, 'index'])->name('formations');
    Route::get('/formations/create', [FormationController::class, 'create'])->name('Createformations');
    Route::post('/formations/create/store', [FormationController::class, 'store'])->name('storeformations');
    Route::get('/formations/{id}/edit', [FormationController::class, 'edit'])->name('editeformations');
    Route::post('/formations/{id}/update', [FormationController::class, 'update'])->name('updateformations');
    Route::delete('/formations/{id}/delete', [FormationController::class, 'destroy'])->name('destroyformations');
    Route::get('/formations/{id}/view', [FormationController::class, 'view'])->name('viewformations');
    Route::get('/formations/Cours/create/{id} ', [CourController::class, 'create'])->name('CreateCours');
      Route::post('/formations/cours/store/{id}', [CourController::class, 'store'])->name('storecours');
});

Route::prefix('apprenant')->middleware(['auth:sanctum', 'verified', 'role:apprenant'])->group(function () {

    Route::get('/', [ApprenantController::class, 'index'])->name('dashboard');

});
Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified', 'role:admin'])->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('index');

});
require __DIR__.'/auth.php';
