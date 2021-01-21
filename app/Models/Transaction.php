<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

  
    protected $fillable = [
        'nome',
        'valor',
        'cpf',
        'status',
    ];

    protected $table = 'transactions';
}