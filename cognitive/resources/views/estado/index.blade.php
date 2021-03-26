@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Estados</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('estado.create') }}">Cadastrar Novo Estado</a>    
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
            <th><b>Estado</b></th>
            <th><b>UF</b></th>
            <th><b>Ação</b></th>
        </tr>

        @foreach ($estado as $estados)
        <tr>
            <td><b>{{$estados->id}}</b></td>
            <td><b>{{$estados->estado}}</b></td>
            <td><b>{{$estados->UF}}</b></td>
            <td>
                <form action="{{ route('estado.destroy', $estados->id) }}" method="post">
                    <a class="btn btn-sm btn-success" href="{{ route('estado.show', $estados->id) }}">Exibir</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('estado.edit', $estados->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

{!! $estado->links() !!}
</div>
@endsection