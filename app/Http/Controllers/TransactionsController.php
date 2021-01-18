<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    
  //  public function __construct()
   // {
    //    $this->middleware('auth');
   // }

    public function index()
    {
        return view('transactions.list');
    }

    public function create()
    {
        return view('transactions.form');
    }
}
