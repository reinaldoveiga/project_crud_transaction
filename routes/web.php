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

//Route::get('/', function () {
 //   return view('welcome');
//});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('transactions', TransactionsController::class);

//Route::resource('transactions/create', TransactionsController::class);

//Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions');

//Route::resources([

   // 'transactions' => TransactionsController::class,
   // 'create' => TransactionsController::class,
//]);

Route::group(['middleware' => 'web'], function(){
    Route::get('/', [HomeController::class, 'index']);
    //Route::get('/', [TransactionsController::class, 'create'])->name('transactions');

    Auth::routes();

    //Route::get('/home', [HomeController::class, 'index'])->name('home');
    //Route::get('/', [TransactionsController::class, 'create'])->name('transactions');
    //Route::get('/home', [TransactionsController::class, 'create'])->name('transactions');

});
    

Route::get('/transactions', [TransactionsController::class, 'create'])->name('transactions');

Route::resource('/transactions/{create}', TransactionsController::class);
Route::resource('/transactions/create', TransactionsController::class);

Route::get('transactions/{id}/edit', [TransactionsController::class, 'edit'])->name('transactions');
Route::post('transactions/update/{id}', [TransactionsController::class, 'update'])->name('transactions');
Route::delete('transactions/delete/{id}', [TransactionsController::class, 'delete'])->name('transactions');