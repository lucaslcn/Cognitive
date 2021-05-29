<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Turma
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('turma.update', $turma->id) }}">
          @csrf
          @method('PATCH')
          <div class="row">
            <div class="form-group col-md-4">
              <label for="iddisciplina">Disciplina:</label>
              <select class="form-control" name="iddisciplina">
                <option value="{{$turma->iddisciplina}}">{{$disciplina->disciplina}}</option>
                @foreach ($disciplinas as $a)
                @if($disciplina->id != $a->id)
                <option value="{{$a->id}}">{{$a->disciplina}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-3">
                <label for="turma">Turma:</label>
                <input type="text" class="form-control" name="turma" value="{{$turma->turma}}"/>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-3">
                <label for="professor">Professor:</label>
                <select class="form-control" name="idprofessor">
                <option value="{{$turma->idprofessor}}">{{$turma->professor->name}}</option>
                @foreach ($users as $u)
                @if($turma->professor->id != $u->id)
                <option value="{{$u->id}}">{{$u->name}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
          <a href="{{route('turma.index')}}" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Atualizar Cadastro</button>
      </form>
  </div>
</div>
@endsection