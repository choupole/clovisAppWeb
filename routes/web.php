<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CaisseController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\PaieController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeDocumentController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/agents/print', [AgentController::class, 'print'])->name('pages.agents.print');
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
});

require __DIR__.'/auth.php';

Route::resource('classes', ClasseController::class);
Route::resource('eleves', EleveController::class);
Route::resource('agents', AgentController::class);
Route::resource('directions', DirectionController::class);
Route::resource('caisses', CaisseController::class);
Route::resource('documents', DocumentController::class);
Route::resource('enseignants', EnseignantController::class);
Route::resource('paies', PaieController::class);
Route::resource('prestations', PrestationController::class);
Route::resource('type_documents', TypeDocumentController::class);
Route::get('paie', [PaieController::class, 'print'])->name('paies.print');
Route::get('eleve', [EleveController::class, 'printEleves'])->name('eleves.printEleves');
Route::get('agent', [AgentController::class, 'printAgents'])->name('agents.printAgents');
Route::get('enseignant', [EnseignantController::class, 'printEnseignants'])->name('enseignants.printEnseignants');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
