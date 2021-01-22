<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransactionsController;


Route::namespace('API')->name('api.')->group(function(){

    Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions');
});

Route::ApiResource('transactions', 'App\Http\Controllers\Api\TransactionsController');




