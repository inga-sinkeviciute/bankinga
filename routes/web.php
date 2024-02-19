<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('users', UserController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add-account', [AccountController::class, 'createForm'])->name('add.account.create');
Route::post('/add-account', [AccountController::class, 'store'])->name('add.account.store');

Route::delete('/delete-account/{id}', [AccountController::class, 'deleteAccount'])->name('delete.account');

// Add/Remove Money
Route::get('/add-remove-money/{id}', [AccountController::class, 'addRemoveMoneyForm'])->name('add.remove.money.form');


Route::post('/add-remove-money/{id}', [AccountController::class, 'addRemoveMoney'])->name('add.remove.money.submit');