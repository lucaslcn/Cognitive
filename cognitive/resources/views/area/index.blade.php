@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Lista de Áreas</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-sm btn-success" href="{{ route('area.create') }}">Cadastrar Nova Área</a>    
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
            <th><b>Área</b></th>
            <th><b>Ação</b></th>
        </tr>

        @foreach ($areas as $area)
        <tr>
            <td><b>{{$area->id}}</b></td>
            <td><b>{{$area->area}}</b></td>
            <td>
                <form action="{{ route('area.destroy', $area->id) }}" method="post">
                    <a class="btn btn-sm btn-success" href="{{ route('area.show', $area->id) }}">Exibir</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('area.edit', $area->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

{!! $areas->links() !!}
</div>
@endsection