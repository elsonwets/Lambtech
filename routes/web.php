<?php

use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\TuteurController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Redirect;
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
    return Redirect::away('https://isigo-wets-projects.vercel.app');
});
Route::get('/home', function () {
    return view('acceuil');
})->name('home');

Route::get('/demande', function () {
    return view('demande');
})->name('demande');

Route::get('/paiement', function () {
    return view('paiement');
})->name('paiement');

Route::get('/signin', function () {
    return view('signin');
})->name('signin');

Route::get('/document', function () {
    return view('document');
})->name('document');

Route::get('/offre', function () {
    return view('offre');
})->name('offre');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// Routes pour les professeurs
Route::resource('professeurs', ProfesseurController::class);

// Routes pour les classes
Route::resource('classes', ClasseController::class);

// Routes pour les paiements
Route::resource('paiements', PaiementController::class);

// Routes pour les étudiants
Route::resource('etudiants', EtudiantController::class);

// Routes pour les tuteurs
Route::resource('tuteurs', TuteurController::class);

// Routes pour les notes
Route::resource('notes', NoteController::class);

// Routes pour les messages
Route::resource('messages', MessageController::class);

// Routes pour les inscriptions
Route::resource('inscriptions', InscriptionController::class);

// Routes pour les documents académiques
Route::resource('documents-academiques', DocumentController::class);

// Routes pour les conversations
Route::resource('conversations', ConversationController::class);

// Routes pour les années scolaires
Route::resource('annees-scolaires', AnneeScolaireController::class);

// Routes pour les matières
Route::resource('matieres', MatiereController::class);

// Routes pour les annonces
Route::resource('annonces', AnnonceController::class);

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::post('/dologin', [\App\Http\Controllers\AuthController::class ,'dologin'])->name('dologin');
Route::get('/disconect',[\App\Http\Controllers\AuthController::class,'deconnexion'])->name('disconection');


