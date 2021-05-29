<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Adicionar Turma
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
      <form method="post" action="{{ route('turma.store') }}">
          @csrf
          <div class="row">
            <div class="form-group col-md-4">
              <label for="iddisciplina">Disciplina:</label>
              <select class="form-control" name="iddisciplina">
                <option>Selecione a disciplina</option>
                @foreach ($disciplinas as $disciplina)
                <option value="{{$disciplina->id}}">{{$disciplina->disciplina}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
                <label for="turma">Turma:</label>
                <input type="text" class="form-control" name="turma"/>
            </div>
          </div>

          <div class="row">
          <div class="form-group col-md-3">
                <label for="idprofessor">Professor:</label>
                <select class="form-control" name="idprofessor">
                <option>Selecione o professor</option>
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <a href="{{route('turma.index')}}" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </div>
</div>
@endsection