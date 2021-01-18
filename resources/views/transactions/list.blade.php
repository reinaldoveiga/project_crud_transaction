@extends('adminlte::page')

@section('content')

<div class="card">
    

    <div class="card-body">

       

            @csrf

            
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
