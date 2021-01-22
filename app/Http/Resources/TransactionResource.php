<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
            'nome' => $this->nome,
            'valor' => $this->valor,
            'cpf'    =>  $this->cpf,
            'status'  =>  $this->status,
            "created_at" => $this->created_at,
        ];
    }
}