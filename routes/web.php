<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web'], function(){
    Route::get('/', [HomeController::class, 'index']);
    
    Auth::routes();

    Route::get('/home', [HomeController::class, 'index'])->name('home');
   
});
    

Route::get('/transactions', [TransactionsController::class, 'index'])->middleware('auth');

Route::get('/transactions/create', [TransactionsController::class, 'create'])->middleware('auth');
Route::post('/transactions/add', [TransactionsController::class, 'add'])->middleware('auth');

Route::get('transactions/{id}/edit', [TransactionsController::class, 'edit'])->middleware('auth');
Route::post('transactions/update/{id}', [TransactionsController::class, 'update'])->middleware('auth');
Route::delete('transactions/delete/{id}', [TransactionsController::class, 'delete'])->middleware('auth');