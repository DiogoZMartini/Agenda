@extends('templates.template')

@section('template')
  <div class="formulario">
    <form class="form-horizontal" method="POST" action="{{ route('endereco.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="cep" class="col-sm-2 control-label furmularioTexto">Cep</label>
            <div class="formularioImput">
              <input type="text" class="form-control" id="cep" name="cep" placeholder="Cep">
            </div>
          </div>
          <div class="form-group">
            <label for="estado" class="col-sm-2 control-label furmularioTexto">Estado</label>
            <div class="formularioImput">
              <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
            </div>
          </div>
          <div class="form-group">
              <label for="cidade" class="col-sm-2 control-label furmularioTexto">Cidede</label>
              <div class="formularioImput">
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidede">
             </div>
            </div>
            <div class="form-group">
              <label for="bairro" class="col-sm-2 control-label furmularioTexto">Bairro</label>
              <div class="formularioImput">
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
              </div>
            </div>
            <div class="form-group">
              <label for="rua" class="col-sm-2 control-label furmularioTexto">Rua</label>
              <div class="formularioImput">
                <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua">
              </div>
            </div>
            <div class="form-group">
              <label for="complemento" class="col-sm-2 control-label furmularioTexto">Complemento</label>
              <div class="formularioImput">
                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
              </div>
            </div>
        <button type="submit" class="btn btn-default">Criar</button>
      </form>
  </div>
@endsection