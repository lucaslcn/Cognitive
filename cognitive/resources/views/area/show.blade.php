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

    <div class="card-header">
        Auditoria
    </div>
    <div>
        <ul>
            @forelse ($audits as $audit)
            <li>
                @lang('auditoria_area.updated.metadata', $audit->getMetadata())
                
                @foreach ($audit->getModified() as $attribute => $modified)
                <ul>
                    <li>@lang('auditoria_area.'.$audit->event.'.modified.'.$attribute, $modified)</li>
                </ul>
                @endforeach
            </li>
            @empty
            <p>@lang('auditoria_area.unavailable_audits')</p>
            @endforelse
        </ul>
    </div>
</div>
@endsection