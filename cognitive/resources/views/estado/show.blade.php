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

    <div class="card-header">
        Auditoria
    </div>
    <div>
        <ul>
            @forelse ($audits as $audit)
            <li>
                @lang('auditoria_estado.updated.metadata', $audit->getMetadata())
                
                @foreach ($audit->getModified() as $attribute => $modified)
                <ul>
                    <li>@lang('auditoria_estado.'.$audit->event.'.modified.'.$attribute, $modified)</li>
                </ul>
                @endforeach
            </li>
            @empty
            <p>@lang('auditoria_estado.unavailable_audits')</p>
            @endforelse
        </ul>
    </div>
</div>
@endsection