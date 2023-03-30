<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProspectController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    } else {
        return view('auth/login');
    }
});


// Route pour la page de listing et gestion des leads
Route::prefix('leads')->group(function () {

    // Affiche la liste des leads
    Route::get('/', [LeadController::class, 'index'])->name('leads.index');

    // Affiche le formulaire pour créer un nouveau lead
    Route::get('/create', [LeadController::class, 'create'])->name('leads.create');

    // Enregistre le nouveau lead
    Route::post('/', [LeadController::class, 'store'])->name('leads.store');

    // Affiche les détails d'un lead existant
    Route::get('/{id}', [LeadController::class, 'show'])->name('leads.show');

    // Affiche le formulaire pour modifier un lead existant
    Route::get('/{id}/edit', [LeadController::class, 'edit'])->name('leads.edit');


    // Met à jour un lead existant
    Route::put('/{id}', [LeadController::class, 'update'])->name('leads.update');

    // Supprime un lead existant
    Route::delete('/{id}', [LeadController::class, 'destroy'])->name('leads.destroy');
});


// Route pour la page de listing et gestion des prospects
Route::middleware(['auth'])->group(function () {
    Route::get('/prospects', [ProspectController::class, 'index'])->name('prospects.index');
    Route::get('/prospects/create', [ProspectController::class, 'create'])->name('prospects.create');
    Route::post('/prospects', [ProspectController::class, 'store'])->name('prospects.store');
    Route::get('/prospects/{prospect}', [ProspectController::class, 'show'])->name('prospects.show');
    Route::get('/prospects/{prospect}/edit', [ProspectController::class, 'edit'])->name('prospects.edit');
    Route::put('/prospects/{prospect}', [ProspectController::class, 'update'])->name('prospects.update');
    Route::delete('/prospects/{prospect}', [ProspectController::class, 'destroy'])->name('prospects.destroy');
});

// Route pour la page de listing et gestion des clients
Route::middleware(['auth'])->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
});


Auth::routes();
//Route::get('/home', [HomeController::class,'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

