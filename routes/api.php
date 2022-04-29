<?php

use App\Http\Controllers\FormateurController;
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
    Route::get('/delete/{id}', [FormateurController::class, 'delete'])->name('delet');

});
