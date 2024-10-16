<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transaction', [TransactionController::class, 'showAllTransactions'])->name('showAllTransactions');
Route::get('/transaction/create', [TransactionController::class, 'createTransactions'])->name('createTransactions');
Route::post('/transaction/store', [TransactionController::class, 'storeTransactions'])->name('storeTransactions');
Route::get('/transaction/{id}', [TransactionController::class, 'readTransactions'])->name('readTransactions');
Route::get('/transaction/{id}/edit', [TransactionController::class, 'editTransactions'])->name('editTransactions');
Route::put('/transaction/{id}/update', [TransactionController::class, 'updateTransactions'])->name('updateTransactions');
Route::delete('/transaction/{id}/delete', [TransactionController::class, 'deleteTransactions'])->name('deleteTransactions');