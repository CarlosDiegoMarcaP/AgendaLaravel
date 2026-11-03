<?php

use App\Http\Controllers\AmigoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    #Carlos
    Route::get('/amigos', [AmigoController::class, 'index'])->name('amigos.index');
    Route::get('/amigos/new', [AmigoController::class, 'create'])->name('amigos.new');
    Route::post('/amigos/save', [AmigoController::class, 'store'])->name('amigos.save');
    Route::get('/amigos/{id}', [AmigoController::class, 'show'])->where('id', '[0-9]+')->name('amigos.show');
    Route::delete('/amigos/rem={id}', [AmigoController::class, 'delete'])->where('id', '[0-9]+')->name('amigos.delete');
    Route::get('/amigos/{amigo}/edit', [AmigoController::class, 'edit'])->name('amigos.edit');
    Route::put('/amigos', [AmigoController::class, 'update'])->name('amigos.update');
});

require __DIR__ . '/auth.php';
