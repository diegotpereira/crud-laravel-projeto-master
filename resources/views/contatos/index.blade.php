@extends('layout')
@section('content')

<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>telefone</th>
                <th>Ação</th>
                <a href="{{ route('contatos.create')}}" class="btn btn-success btn-sm">Novo</a>
            </thead>

            <tbody>
                @foreach($data as $row)
                <tr>
                   <td>{{$row->id}}</td>
                   <td>{{$row->nome}}</td>
                   <td>{{$row->email}}</td>
                   <td>{{$row->telefone}}</td>

                   <td>
                       <a href="{{route('contatos.edit', $row->id)}}" class="btn btn-primary">Editar</a>

                       <form action="{{route('contatos.destroy', $row->id)}}" method="post">
                           @csrf @method('DELETE')
                           <button class="btn btn-danger" type="submit">Deletar</button>
                       </form>
                   </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
      <?php echo $data->render(); ?>
    </div>
</div>