<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\TransactionsRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transactions;


class PaymentController extends Controller
{

    public function index()
    {
        return TransactionResource::collection(Transaction::all());
    }

    public function store(TransactionsRequest $request)
    {
        Transactions::create($request->all());

        return new TransactionResource();
    }

    public function show($id)
    {
        return new TransactionResource(Transactions::FindOrFail($id));
    }

    public function update(TransactionsRequest $request, Transactions $transactions)
    {
        $transactions->update($request->all());

        return $this->response(
            'Transação Atualizada com Sucesso!', new TransactionResource($transactions)
        );

    }

    public function destroy(Transactions $transactions)
    {
        $transactions->destroy();

        return $this->response('Transação Deletada com Sucesso!');
    }
}