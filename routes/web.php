<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EmprestimoController;



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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/livrosDisponiveis', [EmprestimoController::class, 'livrosDisponiveis'])->name('livros.disponiveis');
    Route::post('/emprestimos', [EmprestimoController::class, 'store'])->name('emprestimos.store');
    Route::post('/emprestimos/devolucao', [EmprestimoController::class, 'devolucao'])->name('emprestimos.devolucao');
    Route::get('/emprestimosUsuario', [EmprestimoController::class, 'usuario'])->name('emprestimos.index');
    Route::resource('/livros', LivroController::class)->middleware('role:Administrator');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
