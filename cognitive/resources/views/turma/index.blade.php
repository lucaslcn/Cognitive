@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Turmas</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('turma.create') }}">Cadastrar Nova Turma</a>    
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
            <th><b>Turma</b></th>
            <th><b>ID Professor</b></th>
            <th><b>Professor</b></th>
            <th><b>Ação</b></th>
        </tr>

        @foreach ($turmas as $turma)
        <tr>
            <td><b>{{$turma->id}}</b></td>
            <td><b>{{$turma->turma}}</b></td>
            <td><b>{{$turma->idprofessor}}</b></td>
            <td><b>{{$turma->professor->name}}</b></td>
            <td>
                <form action="{{ route('turma.destroy', $turma->id) }}" method="post">
                    <a class="btn btn-sm btn-success" href="{{ route('turma.show', $turma->id) }}">Exibir</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('turma.edit', $turma->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

{!! $turmas->links() !!}
</div>
@endsection