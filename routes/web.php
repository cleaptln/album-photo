<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonControleur;

Route::get('/', [MonControleur::class, 'index'])->name('index');

Route::get('/photos', [MonControleur::class, 'photos'])->name('photos');

Route::get('/albums', [MonControleur::class, 'albums'])->name('albums');

