<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransactionsController;


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});




Route::namespace('API')->name('api.')->group(function(){

    //Route::get('/transactions', 'TransactionsController@index')->name('transactions');
    Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions');
});


//Route::get('/transactions', [TransactionsController::class, 'new'])->name('transactions');



