<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/login');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/categorias', [CategoryController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/criar', [CategoryController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoryController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{id}/editar', [CategoryController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{id}', [CategoryController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{id}', [CategoryController::class,'destroy'])->name('categorias.destroy');

    Route::get('/alunos', [AlunosController::class, 'index'])->name('alunos.index');
    Route::get('/alunos/criar', [AlunosController::class, 'create'])->name('alunos.create');
    Route::post('/alunos', [AlunosController::class, 'store'])->name('alunos.store');
    Route::get('/alunos/{id}/editar', [AlunosController::class, 'edit'])->name('alunos.edit');
    Route::put('/alunos/{id}', [AlunosController::class, 'update'])->name('alunos.update');
    Route::delete('/alunos/{id}', [AlunosController::class,'destroy'])->name('alunos.destroy');

    Route::get('/livros', [LivrosController::class, 'index'])->name('livros.index');
    Route::get('/livros/criar', [LivrosController::class, 'create'])->name('livros.create');
    Route::post('/livros', [LivrosController::class, 'store'])->name('livros.store');
    Route::get('/livros/{id}/editar', [LivrosController::class, 'edit'])->name('livros.edit');
    Route::put('/livros/{id}', [LivrosController::class, 'update'])->name('livros.update');
    Route::delete('/livros/{id}', [LivrosController::class, 'destroy'])->name('livros.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});