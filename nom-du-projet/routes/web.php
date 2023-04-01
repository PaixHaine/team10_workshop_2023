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

// Route pour la page de listing et gestion des comptes contacts
Route::prefix('contacts')->group(function () {

    // Affiche la liste des contacts
    Route::get('/', [ContactController::class, 'index'])->name('contacts.index');

    // Affiche le formulaire pour créer un nouveau contact
    Route::get('/create', [ContactController::class, 'create'])->name('contacts.create');

    // Enregistre le nouveau contact
    Route::post('/', [ContactController::class, 'store'])->name('contacts.store');

    // Affiche les détails d'un contact existant
    Route::get('/{id}', [ContactController::class, 'show'])->name('contacts.show');

    // Affiche le formulaire pour modifier un contact existant
    Route::get('/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');

    // Met à jour un contact existant
    Route::put('/{id}', [ContactController::class, 'update'])->name('contacts.update');

    // Supprime un contact existant
    Route::delete('/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // Export du CSV
    Route::get('/contacts/export', [ContactController::class, 'export'])->name('contacts.export');

});

});



Auth::routes();
//Route::get('/home', [HomeController::class,'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

