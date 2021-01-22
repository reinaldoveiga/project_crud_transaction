@extends('adminlte::page')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

@section('content')

<h1>Transações</h1>

<div class="card">
    

    <div class="card-body">

    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

       

            @csrf
            
            @foreach($transactions as $transactions)
            @if(Auth::user()->id==$transactions->user_id)
               <div class="container-fluid" style="width:1000px; rigth:-100px" !important >
                    <div class="row">
                            <div class="col-xxl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <table>
                                        <tr><a class="button" data-toggle="modal" data-target="#myModal{{$transactions->id}}">R$ {{$transactions->valor}} - </a></tr>
                                        <tr><a class="button" data-toggle="modal" data-target="#myModal{{$transactions->id}}">{{$transactions->cpf}} - </a></tr>
                                        <tr><a class="button" data-toggle="modal" data-target="#myModal{{$transactions->id}}">{{$transactions->status}} </a><tr>
                                        <tr><a class="button" data-toggle="modal" data-target="#myModal{{$transactions->id}}">{{$transactions->created_at}}</a></tr>
                                        </table>

                                        <div class="dropdown">
                                              <button class="btn btn-outline-success" style="margin-top:-27px; margin-left:840px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                              <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            </svg>
                                              </button >
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="btn btn-ligth" data-toggle="modal" data-target="#myModal{{$transactions->id}}">Ver</a>
                                                <a class="dropdown-item" href="transactions/{{$transactions->id}}/edit">Editar</a>
                                                <a class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete{{$transactions->id}}">Excluir</a>
                                              
                                              </div>
                                              
                                        </div>

                                        <div class="modal" tabindex="-1" role="dialog" id="myModal{{$transactions->id}}">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title">Transação</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <p>Criador da Transação: {{$transactions->nome}}</p>
                                                  <p>Valor: R$ {{$transactions->valor}}</p>
                                                  <p>CPF: {{$transactions->cpf}}</p>
                                                  <p>Status da Transação: {{$transactions->status}}</p>
                                                  <p>Transação criada em: {{$transactions->created_at}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="modal" tabindex="-1" role="dialog" id="myModalDelete{{$transactions->id}}">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title">Transação</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                  <p>Tem certeza de que deseja EXCLUIR está Transação ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                <form action="transactions/delete/{{$transactions->id}}" method="post">
                                                  @csrf
                                                  @method('delete')
                                                  <button type="submit" class="btn btn-danger" >Sim</button>
                                                </form>  
                                                  <button type="button" class="btn btn-warning" data-dismiss="modal">Não</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>


                                    </div>
                                
                               </div>
                            </div>
                    </div>
                </div>

                
                
                @endif
                
@endforeach

        </div>
        </div>


@endsection
