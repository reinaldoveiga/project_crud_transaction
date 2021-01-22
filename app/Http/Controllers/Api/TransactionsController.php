<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transactions;


class TransactionsController extends Controller
{

    public function index()
    {
        return TransactionResource::collection(Transactions::all());
    }

    public function add(TransactionRequest $request)
    {
        Transactions::create($request->all());

        return new TransactionResource();
    }

    public function update(TransactionRequest $request, Transactions $transactions)
    {
        $transactions->update($request->all());

        return $this->response(
            'Transação Atualizada com Sucesso!', new TransactionResource($transactions)
        );

    }

    public function delete($id)
    {
        $transactions->delete();

        return $this->response('Transação Deletada com Sucesso!');
    }
}