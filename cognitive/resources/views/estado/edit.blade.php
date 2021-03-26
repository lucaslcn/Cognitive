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
    Editar estado
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
      <form method="post" action="{{ route('estado.update', $estado->id) }}">
          @csrf
          @method('PATCH')
          <div class="form-group">
              <label for="estado">Estado:</label>
              <input type="text" class="form-control" name="estado" value="{{$estado->estado}}"/>
              <label for="estado">UF:</label>
              <input type="text" class="form-control" name="uf" value="{{$estado->uf}}"/>
          </div>
          <a href="{{route('estado.index')}}" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Atualizar Cadastro</button>
      </form>
  </div>
</div>
@endsection