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
        Visualizar Cidade
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-1">
                <label for="idestado">ID Estado:</label>
                <input type="text" class="form-control" name="idestado" readonly value="{{$cidade->idestado}}"/>
            </div>
            <div class="form-group col-md-3">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" name="estado" readonly value="{{$estado->estado}}"/>
            </div>
            <div class="form-group col-md-1">
                <label for="idcidade">ID Cidade:</label>
                <input type="text" class="form-control" name="idcidade" readonly value="{{$cidade->id}}"/>
            </div>
            <div class="form-group col-md-3">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" name="cidade" readonly value="{{$cidade->cidade}}"/>
            </div>
        </div>
        <div class="row">
            <a href="{{route('cidade.index')}}" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>

    
    <div class="card-header">
        Auditoria
    </div>
    <div>
        <ul>
            @forelse ($audits as $audit)
            <li>
                @lang('auditoria_cidade.updated.metadata', $audit->getMetadata())
                
                @foreach ($audit->getModified() as $attribute => $modified)
                <ul>
                    <li>@lang('auditoria_cidade.'.$audit->event.'.modified.'.$attribute, $modified)</li>
                </ul>
                @endforeach
            </li>
            @empty
            <p>@lang('auditoria_cidade.unavailable_audits')</p>
            @endforelse
        </ul>
    </div>
</div>
@endsection