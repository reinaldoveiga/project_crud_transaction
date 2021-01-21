<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

  
    protected $fillable = [
        'name',
        'valor',
        'cpf',
        'status',
    ];

    protected $table = 'documents';

  

        public function user()
        {

            return $this->belongsTo(User::class);

        }

    
}