<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NiveauController;

Route::get('/', fn() => redirect()->route('documents.index'));

Route::resource('utilisateurs', UtilisateurController::class);
Route::resource('admins',       AdminController::class);
Route::resource('documents',    DocumentController::class);
Route::resource('messages',     MessageController::class);
Route::resource('matieres',     MatiereController::class);
Route::resource('niveaux',      NiveauController::class);

// Téléchargement d'un document
Route::get('documents/{document}/telecharger', [DocumentController::class, 'telecharger'])
     ->name('documents.telecharger');
