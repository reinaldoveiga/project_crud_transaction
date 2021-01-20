@extends('adminlte::page')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

@section('content')

<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

<div class="card">
    

    <div class="card-body">

       

            @csrf

            @foreach($transactions as $transactions)
               <div class="container-fluid" style="width:1000px; rigth:-100px" !important;>
                    <div class="row">
                            <div class="col-xxl-4" >
                                <div class="card">
                                    <div class="card-header">
                                        <table>
                                        <tr>{{$transactions->valor}} - </tr>
                                        <tr>{{$transactions->cpf}} - </tr>
                                        <tr>{{$transactions->id}} - </tr>
                                        <tr>Em processamento <tr>
                                        <tr>{{$transactions->created_at}}</tr>
                                        </table>

                                        <div class="dropdown">
                                              <button class="btn btn-outline-success" style="margin-top:-27px; margin-left:840px" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                              <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            </svg>
                                              </button >
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Ver</a>
                                                <a class="dropdown-item" href="transactions/{{$transactions->id}}/edit">Editar</a>
                                                <form action="transactions/delete/{{$transactions->id}}" method="post">
                                                  @csrf
                                                  @method('delete')
                                                  <button class="btn btn-danger" >Excluir</a>
                                                </form>
                                              
                                              </div>
                                        </div>
                                    </div>
                                
                               </div>
                            </div>
                    </div>
                </div>

                
                

                <div class="container">
  
              





                @endforeach

            
            </div>

            <hr>

        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-2">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Criar Transação
                </button>
               
            </div>
        </div>
        </form>

        </div>
        </div>


@endsection
