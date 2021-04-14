@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Cidades</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('cidade.create') }}">Cadastrar Nova Cidade</a>    
            </div>
        </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-hover table-sm">
        <tr>
            <th><b>ID</b></th>
            <th><b>ID Estado</b></th>
            <th><b>Nome Estado</b></th>
            <th><b>Cidade</b></th>
            <th><b>CEP</b></th>
            <th><b>Ação</b></th>
        </tr>

        @foreach ($cidades as $cidade)
        <tr>
            <td><b>{{$cidade->id}}</b></td>
            <td><b>{{$cidade->idestado}}</b></td>
            <td><b></b></td>
            <td><b>{{$cidade->cidade}}</b></td>
            <td><b>{{$cidade->cep}}</b></td>
            <td>
                <form action="{{ route('cidade.destroy', $cidade->id) }}" method="post">
                    <a class="btn btn-sm btn-success" href="{{ route('cidade.show', $cidade->id) }}">Exibir</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('cidade.edit', $cidade->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

{!! $cidades->links() !!}
</div>
@endsection