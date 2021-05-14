@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Disciplinas</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('disciplina.create') }}">Cadastrar Nova Disciplina</a>    
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
            <th><b>Disciplina</b></th>
            <th><b>ID Área</b></th>
            <th><b>Área</b></th>
            <th><b>Ação</b></th>
        </tr>

        @foreach ($disciplinas as $disciplina)
        <tr>
            <td><b>{{$disciplina->id}}</b></td>
            <td><b>{{$disciplina->disciplina}}</b></td>
            <td><b>{{$disciplina->idarea}}</b></td>
            <td><b>{{$disciplina->area->area}}</b></td>
            <td>
                <form action="{{ route('disciplina.destroy', $disciplina->id) }}" method="post">
                    <a class="btn btn-sm btn-success" href="{{ route('disciplina.show', $disciplina->id) }}">Exibir</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('disciplina.edit', $disciplina->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

{!! $disciplinas->links() !!}
</div>
@endsection