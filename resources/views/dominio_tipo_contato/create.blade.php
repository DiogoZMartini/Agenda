@extends('templates.template')

@section('template')
    <form class="form-inline" method="POST" action="{{ route('dominio.tipo.contato.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="sr-only" for="inputTipoContato">Tipo</label>
          <input type="text" class="form-control" id="inputTipoContato" placeholder="Tipo">
        </div>
        <div class="form-group">
          <label class="sr-only" for="inputDescricao">Descrição</label>
          <input type="text" class="form-control" id="inputDescricao" placeholder="Descrição">
        </div>
        <button type="submit" class="btn btn-default">Criar</button>
      </form>
@endsection