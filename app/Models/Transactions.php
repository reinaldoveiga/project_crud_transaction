<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{

  
    protected $fillable = [
        'nome',
        'valor',
        'cpf',
        'status',
        'user_id',
    ];

    protected $table = 'transactions';
}
