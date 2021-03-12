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
    Editar Disciplina
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
      <form method="post" action="{{ route('disciplina.update', $disciplina->id) }}">
          @csrf
          @method('PATCH')
          <div class="row">
            <div class="form-group col-md-4">
              <label for="idarea">Área:</label>
              <select class="form-control" name="idarea">
                <option value="{{$disciplina->idarea}}">{{$area->area}}</option>
                @foreach ($areas as $a)
                @if($area->id != $a->id)
                <option value="{{$a->id}}">{{$a->area}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-3">
                <label for="disciplina">Disciplina:</label>
                <input type="text" class="form-control" name="disciplina" value="{{$disciplina->disciplina}}"/>
            </div>
          </div>
          <a href="{{route('disciplina.index')}}" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Atualizar Cadastro</button>
      </form>
  </div>
</div>
@endsection