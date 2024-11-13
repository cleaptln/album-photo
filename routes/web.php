<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonControleur;

Route::get('/', [MonControleur::class, 'index'])->name('index');


