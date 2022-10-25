<?php

use App\Http\Controllers\Admin\AuthorController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;

Route::get('/admin/authors', [AuthorController::class, 'index'])->name('authors');
Route::get('/admin/authors/create', [AuthorController::class, 'create'])->name('show_form');
Route::post('/admin/authors/store', [AuthorController::class, 'store'])->name('store');
