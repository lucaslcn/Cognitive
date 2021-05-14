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
    Adicionar Cidade
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
      <form method="post" action="{{ route('cidade.store') }}">
          @csrf
          <div class="row">
            <div class="form-group col-md-4">
              <label for="idestado">Estado:</label>
              <select class="form-control" name="idestado">
                <option>Selecione o estado</option>
                @foreach ($estados as $estado)
                <option value="{{$estado->id}}">{{$estado->estado}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" name="cidade"/>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-3">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" name="cep"/>
            </div>
          </div>
          <a href="{{route('cidade.index')}}" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </div>
</div>
@endsection