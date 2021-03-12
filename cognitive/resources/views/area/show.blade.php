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
        Visualizar Área
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="area">Área:</label>
            <input type="text" class="form-control" name="area" readonly value="{{$area->area}}"/>
        </div>
        <div class="row">
            <a href="{{route('area.index')}}" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>
</div>
@endsection