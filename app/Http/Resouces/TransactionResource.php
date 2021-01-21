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
            'id'            => $this->id,
            'nome'          => $this->nome,
            //'document'      => $this->document,
            'valor'         => $this->valor,
            'cpf'           =>  $this->cpf,
            "created_at"    => $this->created_at,
        ];
    }
}