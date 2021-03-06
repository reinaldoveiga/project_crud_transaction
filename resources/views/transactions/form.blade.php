@extends('adminlte::page')

@section('content')

<div class="card">
    <div class="card-header">
        <i class="fa fa-info-circle"></i>
        <h5>Preencha os campos e clique em Salvar</h5>
        <hr class="m-b-5">
    </div>
    
    <div class="card-body">
    
    @if(Request::is('*/edit'))
    
    <form method="post" action="{{url('transactions/update')}}/{{$transactions->id}}"> 
@csrf

<fieldset disabled>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Criador da Transação:</label>
    <div class="col-md-9">
    <input type="text" id="nome" class="form-control" placeholder="{{ Auth::user()->name }}" autofocus>
    </div>
</div>
    
</fieldset>


<div class="form-group row">
    <label class="col-sm-2 col-form-label">Valor: *</label>
    <div class="col-md-9">
        <input type="text" id="valor" name="valor" class="form-control @error('name') @errror is-invalid @enderror" value="{{ $transactions->valor}}" onkeyup="toUpper(this)" placeholder="Digite o Valor da Transação" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">CPF: *</label>
    <div class="col-md-9">
        <input type="text" id="cpf" name="cpf" class="form-control @error('name') @errror is-invalid @enderror" value="{{$transactions->cpf}}" onkeyup="toUpper(this)" placeholder="Digite o CPF" autofocus>

        @error('details')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>





<div class="form-group col-md-4">
                <label class="col-sm" for="status">Status: *</label>
                <select id="status" name="status" class="form-control" style="magin-rigth:120px" value="{{$transactions->status}}">
                    <option>Em processamento</option>
                    <option>Aprovada</option>
                    <option>Negada</option>
                    
                </select>
                </div>

<hr>

<div class="form-group row mb-0">
<div class="col-md-9 offset-md-2">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i> Salvar
    </button>
    <a class="btn btn-warning" href= "{{'/transactions'}}">
        <i class="fa fa-undo"></i> Voltar
    </a>
</div>
</div>

</form>




@else


    <form method="post" action="{{ url('transactions/add') }}"> 
 
            @csrf

            <fieldset disabled>
    
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Criador da Transação:</label>
                <div class="col-md-9">
                <input type="text" id="{{ Auth::user()->name }}" name="{{ Auth::user()->name }}" class="form-control" placeholder="{{ Auth::user()->name }}" autofocus>
                </div>
                </div>
                
            </fieldset>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Valor: *</label>
                <div class="col-md-9">
                    <input type="text" id="valor" name="valor" class="form-control @error('name') @errror is-invalid @enderror" value="{{ old('name', $transactions->valor ?? null) }}" onkeyup="toUpper(this)" placeholder="Digite o Valor da Transação" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">CPF: *</label>
                <div class="col-md-9">
                    <input type="text" id="cpf" name="cpf" class="form-control @error('name') @errror is-invalid @enderror" value="{{ old('name', $transactions->cpf ?? null) }}" onkeyup="toUpper(this)" placeholder="Digite o CPF" autofocus>

                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>






            <div class="form-group col-md-4">
                <label class="col-sm" for="status">Status: *</label>
                <select id="status" name="status" class="form-control" style="magin-rigth:120px">
                    <option>Em processamento</option>
                    <option>Aprovada</option>
                    <option>Negada</option>
                    
                </select>
                </div>

                

            <hr>

        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-2">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Salvar
                </button>
                <a class="btn btn-warning" href= "{{'/transactions'}}">
                    <i class="fa fa-undo"></i> Voltar
                </a>
            </div>
        </div>
        
        </form>

        @endif
        
    </div>
    </div>
   
</div>
@endsection

