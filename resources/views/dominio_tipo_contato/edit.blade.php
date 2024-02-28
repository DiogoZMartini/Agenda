@extends('templates.template')

@section('template')
  <div class="formulario">
    <form class="form-horizontal" method="POST" action="{{ route('dominio.tipo.contato.update' , $DominioTipoContato->id) }}">
        {{ csrf_field() }}
        @method('PUT')
        <div class="form-group">
          <label for="tipo" class="col-sm-2 control-label furmularioTexto">Tipo</label>
          <div class="formularioImput">
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $DominioTipoContato->tipo }}">
          </div>
        </div>
        <div class="form-group">
          <label for="descricao" class="col-sm-2 control-label furmularioTexto">Descrição</label>
          <div class="formularioImput">
            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $DominioTipoContato->descricao }}">
          </div>
        </div>
        <button type="submit" class="btn btn-default">Atualizar</button>
      </form>
  </div>
@endsection