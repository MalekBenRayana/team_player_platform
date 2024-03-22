<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerInterfaceController;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::prefix('joueurs')->group(function () {
        Route::get('/create', [JoueurController::class, 'create'])->name('joueurs.create');
        Route::post('/store', [JoueurController::class, 'store'])->name('joueurs.store');

        Route::get('/{joueur}/interface', [JoueurController::class, 'interface'])->name('joueurs.interface');
        Route::put('/update/{idjoueur}', [JoueurController::class, 'update'])->name('joueurs.update');
        Route::delete('/destroy/{idjoueur}', [JoueurController::class, 'destroy'])->name('joueurs.destroy');
        Route::get('/edit/{idjoueur}', [JoueurController::class, 'edit'])->name('joueurs.edit');
        Route::get('/search', [JoueurController::class, 'search'])->name('joueurs.search');
        Route::post('/like/{idjoueur}', [JoueurController::class, 'like'])->name('joueurs.like');
        Route::get('/show/{idjoueur}', [JoueurController::class, 'show'])->name('joueurs.show');
 


        Route::get('/mon-espace', function () {
            $joueurExists = \App\Models\Joueur::where('id', Auth::id())->exists();
            if ($joueurExists) {
                return redirect()->route('joueurs.interface', ['joueur' => Auth::user()->joueur->idjoueur]);
            } else {
                return redirect()->route('joueurs.create');
            }
        })->name('mon-espace');
    });

    
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        [HomeController::class, 'index'];
    })->name('dashboard');
});

