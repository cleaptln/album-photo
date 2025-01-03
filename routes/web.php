<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonControleur;

Route::get('/', [MonControleur::class, 'index'])->name('index');

Route::get('/photos', [MonControleur::class, 'photos'])->name('photos');

Route::get('/albums', [MonControleur::class, 'albums'])->name('albums');

Route::get('/albums/{id}', [MonControleur::class, 'detailsAlbum'])->name('detailsAlbum')->where(['id' => '[0-9]+']);

Route::get('/tags/{tag}', [MonControleur::class, 'tag'])->name('tag')->where(['tag' =>'[a-z]+']);


Route::get('/login', [MonControleur::class, 'login'])->name('login');

Route::get('/register', [MonControleur::class, 'register'])->name('register');

Route::get('/creer-album', [MonControleur::class, 'creerAlbum'])->name('creerAlbum');
Route::post('/saveAlbum', [MonControleur::class, 'saveAlbum'])->name('saveAlbum');


Route::get("/mes-albums/{id}", [MonControleur::class, 'userAlbums'])->name('userAlbums')->where(['id' => '[0-9]+'])->middleware("auth");


Route::delete('/photo/{photo}', [MonControleur::class, 'deletePhoto'])->name('deletePhoto');
Route::delete('/album/{album}', [MonControleur::class, 'deleteAlbum'])->name('deleteAlbum');

Route::get('/photos', [MonControleur::class, 'photos'])->name('photos');
Route::get('/photos/search', [MonControleur::class, 'search'])->name('search');

Route::post('/albums/{id}/update', [MonControleur::class, 'updateAlbum'])->name('updateAlbum');
