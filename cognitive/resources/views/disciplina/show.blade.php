<!-- show.blade.php -->

@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Visualizar Disciplina
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-1">
                <label for="idarea">ID Área:</label>
                <input type="text" class="form-control" name="idarea" readonly value="{{$disciplina->idarea}}"/>
            </div>
            <div class="form-group col-md-3">
                <label for="area">Área:</label>
                <input type="text" class="form-control" name="area" readonly value="{{$area->area}}"/>
            </div>
            <div class="form-group col-md-1">
                <label for="iddisciplina">ID Disciplina:</label>
                <input type="text" class="form-control" name="iddisciplina" readonly value="{{$disciplina->id}}"/>
            </div>
            <div class="form-group col-md-3">
                <label for="disciplina">Disciplina:</label>
                <input type="text" class="form-control" name="disciplina" readonly value="{{$disciplina->disciplina}}"/>
            </div>
        </div>
        <div class="row">
            <a href="{{route('disciplina.index')}}" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>
</div>
@endsection