<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    if (auth()->user()) {
        return view('home');
    }

    return redirect()->route('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::name('users')->prefix('users')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('.index');
});

Route::name('produtos')->prefix('produtos')->group(function () {
    Route::get('/', [ProdutoController::class, 'index'])->name('.index');
    Route::get('/show/{id}', [ProdutoController::class, 'show'])->name('.show');
    Route::post('/store', [ProdutoController::class, 'store'])->name('.store');
});

