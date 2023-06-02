<?php

use App\Http\Controllers\PlaylistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('welcome');});
Route::resource('playlist',PlaylistController::class);
Route::get('musique/{titremus}/playlists', [PlaylistController::class, 'index'])->name('playlist.musique');
Route::get('artiste/{nom}/playlists', [PlaylistController::class, 'index'])->name('playlist.artiste');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/les_artistes', [App\Http\Controllers\ArtistesController::class, 'index'])->name('artiste.showAll');

Route::get('/supp_artiste/{id}', [App\Http\Controllers\ArtistesController::class, 'supprimer'])->name('artiste.destroy');

Route::get('/edit_artiste/{id}', [App\Http\Controllers\ArtistesController::class, 'edit'])->name('artiste.edit');

Route::get('/voir_artiste/{id}', [App\Http\Controllers\ArtistesController::class, 'voir'])->name('artiste.voir');

Route::post('/update_artiste/{id}', [App\Http\Controllers\ArtistesController::class, 'update'])->name('artiste.update');

Route::get('/add_artistes', [App\Http\Controllers\ArtistesController::class, 'creer'])->name('artiste.create');


Route::post('/store_artiste', [App\Http\Controllers\ArtistesController::class, 'store'])->name('artiste.store');

Route::resource('artistes',PlaylistController::class);


