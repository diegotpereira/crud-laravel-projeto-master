@extends('layout')
@section('content')
{!! F::open(['action' => ['ContatoController@update', $data->id],'method' => 'PUT'])!!}
   <div class="col-md-6">
       <div class="form-group required">
           {!! F::label("NOME")!!}
           {!! F::text("nome", $data->nome, ["class"=>"form-control", "required"=>"required"])!!}
           
       </div>
       <div class="form-group required">
           {!! F::label("EMAIL")!!}
           {!! F::text("email", $data->email, ["class"=>"form-control", "required"=>"required"])!!}
       </div>
       <div class="form-group required">
           {!! F::label("TELEFONE")!!}
           {!! F::text("telefone", $data->telefone, ["class"=>"form-control", "required"=>"required"])!!}
       </div>

       <div class="well well-sm clearfix">
          <button class="btn btn-success pull-rigth" title="Save" type="submit">Alterar</button>
       </div>
   </div>
{!! Form::close() !!}
@endsection