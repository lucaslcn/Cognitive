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
    Editar Área
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
      <form method="post" action="{{ route('area.update', $area->id) }}">
          @csrf
          @method('PATCH')
          <div class="form-group">
              <label for="area">Área:</label>
              <input type="text" class="form-control" name="area" value="{{$area->area}}"/>
          </div>
          <a href="{{route('area.index')}}" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Atualizar Cadastro</button>
      </form>
  </div>
</div>
@endsection