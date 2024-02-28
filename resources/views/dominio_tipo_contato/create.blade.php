@extends('templates.template')

@section('template')
  <div class="formulario">
    <form class="form-horizontal" method="POST" action="{{ route('dominio.tipo.contato.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="tipo" class="col-sm-2 control-label furmularioTexto">Tipo</label>
          <div class="formularioImput">
            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo">
          </div>
        </div>
        <div class="form-group">
          <label for="descricao" class="col-sm-2 control-label furmularioTexto">Descrição</label>
          <div class="formularioImput">
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
          </div>
        </div>
        <button type="submit" class="btn btn-default">Criar</button>
      </form>
  </div>
@endsection