@extends('adminlte::page')

@section('content')










<div class="card">
    <div class="card-header">
        <i class="fa fa-info-circle"></i>
        <h5>Preencha os campos e clique em Criar Transação</h5>
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






<div class="form-group row">
    <label class="col-sm-2 col-form-label">Status</label>
    <div class="col-md-9">
        <input type="hidden" name="status" value="0">
        <input type="checkbox" name="status" value="1" >

        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<hr>

<div class="form-group row mb-0">
<div class="col-md-9 offset-md-2">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i> Atualizar Transação
    </button>
    <a class="btn btn-warning" href= "{{'/transactions'}}">
        <i class="fa fa-undo"></i> Voltar
    </a>
</div>
</div>

</form>




@else


    <form method="post" action="{{'transactions'}}"> 
 
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
                    <input type="text" id="valor" name="valor" class="form-control @error('name') @errror is-invalid @enderror" value="{{ old('name', $tasks->name ?? null) }}" onkeyup="toUpper(this)" placeholder="Digite o Valor da Transação" autofocus>

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
                    <input type="text" id="cpf" name="cpf" class="form-control @error('name') @errror is-invalid @enderror" value="{{ old('name', $tasks->details ?? null) }}" onkeyup="toUpper(this)" placeholder="Digite o CPF" autofocus>

                    @error('details')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>






            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-md-9">
                    <input type="hidden" name="status" value="0">
                    <input type="checkbox" name="status" value="1" >

                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <hr>

        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-2">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Criar
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

