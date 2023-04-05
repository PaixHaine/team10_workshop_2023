<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
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

//Redirection vers login si pas connecté
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
    Route::post('/contacts/import', [ContactController::class, 'import'])->name('contacts.import');


    Route::post('/contacts/{id}/rdv', [ActionController::class, 'rdv'])->name('contacts.rdv');
    Route::post('/contacts/{id}/mail', [ActionController::class, 'mail'])->name('contacts.mail');
    Route::post('/contacts/{id}/call', [ActionController::class, 'call'])->name('contacts.call');
    Route::post('/contacts/{id}/note', [ActionController::class, 'note'])->name('contacts.note');

    Route::get('/contacts/{contact}/history', [ActionController::class, 'history'])->name('contacts.actions.history');
    Route::get('/contacts/{contact}/actions/{action_id}', [ActionController::class, 'showAction'])->name('contacts.actions.show');
    Route::delete('/contacts/{contact}/actions/{action}', [ActionController::class, 'destroyAction'])->name('contacts.actions.destroy');

    Route::post('/home', [ContactController::class, 'storeTodo'])->name('contacts.storeTodo');
    Route::delete('/todos/{todo}', [ContactController::class, 'destroyTodo'])->name('contacts.destroyTodo');
    Route::post('/todos/{id}/done', [ContactController::class, 'markDone'])->name('todos.markDone');


});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/add', [AdminController::class, 'add'])->name('admin.add');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/{id}/update', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/show', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/{id}/show', [AdminController::class, 'show'])->name('admin.show');
    Route::delete('/{id}/delete', [AdminController::class, 'delete'])->name('admin.delete');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

