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
        Visualizar Estado
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" class="form-control" name="estado" readonly value="{{$estado->estado}}"/>
            <label for="uf">UF:</label>
            <input type="text" class="form-control" name="uf" readonly value="{{$estado->UF}}"/>
        </div>
        <div class="row">
            <a href="{{route('estado.index')}}" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>
</div>
@endsection