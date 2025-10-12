<?php

use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transaction',[TransactionController::class,'index'])->name('transaction');
Route::get('/transaction/detail/{id}',[TransactionController::class,'showDetail'])->name('transaction.detail');
Route::get('/transaction/hasil',[TransactionController::class,'showHasil'])->name('transaction.hasil');
Route::get('/transaction/create',[TransactionController::class,'create'])->name('transaction.create');