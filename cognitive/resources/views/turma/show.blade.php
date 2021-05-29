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
        Visualizar Turma
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-1">
                <label for="iddisciplina">ID Disciplina:</label>
                <input type="text" class="form-control" name="iddisciplina" readonly value="{{$turma->iddisciplina}}"/>
            </div>
            <div class="form-group col-md-3">
                <label for="disciplina">Disciplina:</label>
                <input type="text" class="form-control" name="disciplina" readonly value="{{$disciplina->disciplina}}"/>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-1">
                <label for="idturma">ID Turma:</label>
                <input type="text" class="form-control" name="idturma" readonly value="{{$turma->id}}"/>
            </div>
            <div class="form-group col-md-3">
                <label for="turma">Turma:</label>
                <input type="text" class="form-control" name="turma" readonly value="{{$turma->turma}}"/>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-1">
                <label for="idprofessor">ID Professor:</label>
                <input type="text" class="form-control" name="idprofessor" readonly value="{{$turma->idprofessor}}"/>
            </div>
            <div class="form-group col-md-3">
                <label for="professor">Professor:</label>
                <input type="text" class="form-control" name="professor" readonly value="{{$turma->professor->name}}"/>
            </div>
        </div>
        <div class="row">
            <a href="{{route('turma.index')}}" class="btn btn-sm btn-success">Voltar</a>
        </div>
    </div>

    
    <div class="card-header">
        Auditoria
    </div>
    <div>
        <ul>
            @forelse ($audits as $audit)
            <li>
                @lang('auditoria_turma.updated.metadata', $audit->getMetadata())
                
                @foreach ($audit->getModified() as $attribute => $modified)
                <ul>
                    <li>@lang('auditoria_turma.'.$audit->event.'.modified.'.$attribute, $modified)</li>
                </ul>
                @endforeach
            </li>
            @empty
            <p>@lang('auditoria_turma.unavailable_audits')</p>
            @endforelse
        </ul>
    </div>
</div>
@endsection