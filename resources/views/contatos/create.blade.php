@extends('layout')
@section('content')
{!! F::open(['action' => 'ContatoController@store', 'method' => 'POST'])!!}
   <div class="col-md-6">
       <div class="form-group required">
           {!! F::label("NOME")!!}
           {!! F::text("nome", null, ["class"=>"form-control", "required"=>"required"])!!}
           
       </div>
       <div class="form-group required">
           {!! F::label("EMAIL")!!}
           {!! F::text("email", null, ["class"=>"form-control", "required"=>"required"])!!}
       </div>
       <div class="form-group required">
           {!! F::label("TELEFONE")!!}
           {!! F::text("telefone", null, ["class"=>"form-control", "required"=>"required"])!!}
       </div>

       <div class="well well-sm clearfix">
          <button class="btn btn-success pull-rigth" title="Save" type="submit">Salvar</button>
       </div>
   </div>
{!! Form::close() !!}
@endsection