<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmigoController;
use Psy\Completion\DeepestNodeVisitor;

Route::get('/', function () {
    // return view('welcome');
    return view('ingreso');
});
Route::get('/amigos', [AmigoController::class, 'index'])->name('amigos.index');
Route::get('/amigos/new', [AmigoController::class, 'create'])->name('amigos.new');
Route::post('/amigos/save', [AmigoController::class, 'store'])->name('amigos.save');
Route::get('/amigos/{id}', [AmigoController::class, 'show'])->where('id', '[0-9]+')->name('amigos.show');
Route::get('/amigos/rem={id}', [AmigoController::class, 'delete'])->where('id', '[0-9]+')->name('amigos.delete');
Route::get('/amigos/{amigo}/edit', [AmigoController::class, 'edit'])->name('amigos.edit');
Route::put('/amigos', [AmigoController::class, 'update'])->name('amigos.update');

