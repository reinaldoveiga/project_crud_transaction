<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{

  
    protected $fillable = [
        //'nome',
        'valor',
        'cpf',
    ];

    protected $table = 'transactions';
}
