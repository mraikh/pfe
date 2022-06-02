<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\AvancementController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReclamtionController;
use App\Http\Controllers\ChapitreController;

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
Route::get('/', [CourController::class, 'homecours'])->name('homecours');

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
    Route::post('/Editeprofile', [FormateurController::class, 'Editeprofile'])->name('Editeprofile');
    Route::post('/updateprofile', [FormateurController::class, 'updateprofile'])->name('updateprofile');
    Route::post('/ajouterPhotoprofile', [FormateurController::class, 'ajouterPhotoprofile'])->name('ajouterPhotoprofile');
    Route::get('/formations', [FormationController::class, 'index'])->name('formations');
    Route::get('/indexApprenant', [FormateurController::class, 'indexApprenant'])->name('indexApprenant');
    Route::post('/remove', [ApprenantController::class, 'remove'])->name('remove');
    Route::get('/formations/create', [FormationController::class, 'create'])->name('Createformations');
    Route::post('/formations/create/store', [FormationController::class, 'store'])->name('storeformations');
    Route::get('/formations/{id}/edit', [FormationController::class, 'edit'])->name('editeformations');
    Route::post('/formations/{id}/update', [FormationController::class, 'update'])->name('updateformations');
    Route::delete('/formations/{id}/delete', [FormationController::class, 'destroy'])->name('destroyformations');
    Route::get('/formations/{id}/view', [FormationController::class, 'view'])->name('viewformations');
    Route::get('/formations/Cours/create/{id} ', [CourController::class, 'create'])->name('CreateCours');
      Route::post('/formations/cours/store/{id}', [CourController::class, 'store'])->name('storecours');
      Route::get('/formations/Cours/{id}/edite', [CourController::class, 'edit'])->name('editeCours');
      Route::get('/formations/{id}/view/Cour', [CourController::class, 'view'])->name('viewCours');
      Route::get('/formations/CreateChapitre/{id}', [ChapitreController::class, 'create'])->name('CreateChapitre');
      Route::post('/formations/create/store/{id}/chapitre', [ChapitreController::class, 'store'])->name('storeChapitre');
      Route::post('/formations/create/update/{id}/chapitre', [ChapitreController::class, 'update'])->name('updateChapitre');
      Route::get('/formations/Cours/{id}/editeChapitre', [ChapitreController::class, 'edit'])->name('editeChapitre');
      Route::delete('/formations/{id}/deleteChapitre', [ChapitreController::class, 'destroy'])->name('destroyChapitres');
  Route::post('/formations/cours/{id}/update', [CourController::class, 'update'])->name('updatecours');
      Route::delete('/formations/cours/{id}/delete', [CourController::class, 'destroy'])->name('destroycours');
      Route::get('/reclamation', [ReclamtionController::class, 'index'])->name('reclamation');
      Route::get('/reclamationCreate', [ReclamtionController::class, 'Create'])->name('reclamationCreate');
      Route::post('/reclamationStore', [ReclamtionController::class, 'Store'])->name('reclamationStore');
      Route::delete('/reclamation/{id}/delete', [ReclamtionController::class, 'destroy'])->name('destroyReclamtion');
      Route::post('/reclamationUpdate/{id}', [ReclamtionController::class, 'update'])->name('reclamationUpdate');
      Route::get('/reclamtions/{id}/edit', [ReclamtionController::class, 'edit'])->name('editereclamtions');
      Route::get('/{id}', [FormateurController::class, 'view'])->name('view');

});

Route::prefix('apprenant')->middleware(['auth:sanctum', 'verified', 'role:apprenant'])->group(function () {

    Route::get('/', [ApprenantController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ApprenantController::class, 'profile'])->name('profile');
    Route::post('/Editeprofile', [ApprenantController::class, 'Editeprofile'])->name('Editeprofile');
    Route::post('/updateprofile', [ApprenantController::class, 'updateprofile'])->name('updateprofile');
    Route::post('/ajouterPhotoprofile', [ApprenantController::class, 'ajouterPhotoprofile'])->name('ajouterPhotoprofile');
    Route::get('/formations', [ApprenantController::class, 'formations'])->name('formations');
    Route::post('/inscription', [ApprenantController::class, 'inscription'])->name('inscription');
    Route::post('/avancement', [AvancementController::class, 'avancement'])->name('done');
    Route::get('/view/{id}', [ApprenantController::class, 'view'])->name('view');
Route::get('/viewCour', [ApprenantController::class, 'viewCour'])->name('viewCour');
Route::get('/mesFormations', [ApprenantController::class, 'mesFormations'])->name('mesFormations');
 Route::get('/reclamation', [ReclamtionController::class, 'indexapprenant'])->name('reclamation');
    Route::get('/reclamationCreate', [ReclamtionController::class, 'Createapprenant'])->name('reclamationCreate');
    Route::post('/reclamationStore', [ReclamtionController::class, 'Storeapprenant'])->name('reclamationStore');
    Route::delete('/reclamation/{id}/delete', [ReclamtionController::class, 'destroyapprenant'])->name('destroyReclamtion');
    Route::post('/reclamationUpdate', [ReclamtionController::class, 'updateapprenant'])->name('reclamationUpdate');
    Route::get('/reclamtions/{id}/edit', [ReclamtionController::class, 'editapprenant'])->name('editereclamtions');
});
Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified', 'role:admin'])->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('/reclamation', [ReclamtionController::class, 'indexAdmin'])->name('reclamation');
 Route::delete('/reclamation/delete', [ReclamtionController::class, 'destroyadmin'])->name('destroyReclamtion');
 Route::post('/reclamationUpdate', [ReclamtionController::class, 'updateadmin'])->name('reclamationUpdate');
 Route::get('/reclamtions/{id}/edit', [ReclamtionController::class, 'editadmin'])->name('editereclamtions');
Route::get('/fourmateurs', [FormateurController::class, 'indexAdmin'])->name('fourmateurs');
Route::get('/Apprenants', [ApprenantController::class, 'indexAdmin'])->name('Apprenants');
Route::get('/Formations', [FormationController::class, 'indexAdmin'])->name('Formations');
Route::get('/deleteformation/{id}', [FormationController::class, 'delete'])->name('delete');
Route::get('/deleteApprenant/{id}', [ApprenantController::class, 'delete'])->name('delete');
Route::get('/deleteFormateur/{id}', [FormateurController::class, 'delete'])->name('delete');

});
require __DIR__.'/auth.php';
