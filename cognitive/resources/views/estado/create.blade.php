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
    Adicionar Estado
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
      <form method="post" action="{{ route('estado.store') }}">
          @csrf
          <div class="form-group">
              <label for="estado">Estado:</label>
              <input type="text" class="form-control" name="estado"/>
          </div>

          <div class="form-group">
              <label for="uf">UF:</label>
              <input type="text" class="form-control" name="uf"/>
          </div>
          <a href="{{route('estado.index')}}" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </div>
</div>
@endsection