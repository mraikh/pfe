<?php

use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\FormationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('formateurs')->name('formateurs.')->group(function () {
    Route::get('/', [FormateurController::class, 'index'])->name('index');
    Route::get('/{id}', [FormateurController::class, 'view'])->name('view');
    Route::post('/store', [FormateurController::class, 'store'])->name('store');
    Route::post('/edit', [FormateurController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [FormateurController::class, 'delete'])->name('delete');
});

Route::prefix('formations')->name('formations.')->group(function () {
    Route::get('/', [FormationController::class, 'index'])->name('index');
    Route::get('/{id}', [FormationController::class, 'view'])->name('view');
    Route::post('/store', [FormationController::class, 'store'])->name('store');
    Route::post('/edit', [FormationController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [FormationController::class, 'delete'])->name('delete');
});

Route::prefix('cours')->name('cours.')->group(function () {
    Route::get('/', [CourController::class, 'index'])->name('index');
    Route::get('/{id}', [CourController::class, 'view'])->name('view');
    Route::post('/store', [CourController::class, 'store'])->name('store');
    Route::post('/edit', [CourController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [CourController::class, 'delete'])->name('delete');
});

Route::prefix('chapitres')->name('chapitres.')->group(function () {
    Route::get('/', [ChapitreController::class, 'index'])->name('index');
    Route::get('/{id}', [ChapitreController::class, 'view'])->name('view');
    Route::post('/store', [ChapitreController::class, 'store'])->name('store');
    Route::post('/edit', [ChapitreController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [ChapitreController::class, 'delete'])->name('delete');
});

Route::prefix('apprenants')->name('apprenants.')->group(function () {
    Route::get('/', [ApprenantController::class, 'index'])->name('index');
    Route::get('/{id}', [ApprenantController::class, 'view'])->name('view');
    Route::post('/store', [ApprenantController::class, 'store'])->name('store');
    Route::post('/edit', [ApprenantController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [ApprenantController::class, 'delete'])->name('delete');
    Route::post('/inscrire', [ApprenantController::class, 'inscrire'])->name('inscrire');
    Route::post('/remove', [ApprenantController::class, 'remove'])->name('remove');
});
