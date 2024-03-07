@extends('templates.template')

@section('template')
  <div class="formulario">
    <form class="form-horizontal" method="POST" action="{{ route('endereco.update' , $Endereco->id) }}">
        {{ csrf_field() }}
        @method('PUT')
        <div class="endereco">
          <div class="form-group">
              <label for="cep" class="col-sm-2 control-label furmularioTexto">Cep</label>
              <div class="formularioImput campoEndereco">
                  <input type="text" class="form-control @error('cep') campoVermelho @enderror" id="cep" name="cep" value="{{ $Endereco->cep }}">
              </div>
          </div>
          <div class="form-group">
              <label for="estado" class="col-sm-2 control-label furmularioTexto">Estado</label>
              <div class="formularioImput campoEndereco">
                  <input type="text" class="form-control @error('estado') campoVermelho @enderror" id="estado" name="estado" value="{{ $Endereco->estado }}">
              </div>
          </div>
          <div class="form-group">
              <label for="cidade" class="col-sm-2 control-label furmularioTexto">Cidede</label>
              <div class="formularioImput campoEndereco">
                  <input type="text" class="form-control @error('cidade') campoVermelho @enderror" id="cidade" name="cidade" value="{{ $Endereco->cidade }}">
              </div>
          </div>
          <div class="form-group">
              <label for="bairro" class="col-sm-2 control-label furmularioTexto">Bairro</label>
              <div class="formularioImput campoEndereco">
                  <input type="text" class="form-control @error('bairro') campoVermelho @enderror" id="bairro" name="bairro" value="{{ $Endereco->bairro }}">
              </div>
          </div>
          <div class="form-group">
              <label for="rua" class="col-sm-2 control-label furmularioTexto">Rua</label>
              <div class="formularioImput campoEndereco">
                  <input type="text" class="form-control @error('rua') campoVermelho @enderror" id="rua" name="rua" value="{{ $Endereco->rua }}">
              </div>
          </div>
          <div class="form-group">
              <label for="numero" class="col-sm-2 control-label furmularioTexto">Número</label>
              <div class="formularioImput campoEndereco">
                  <input type="text" class="form-control @error('numero') campoVermelho @enderror" id="numero" name="numero" value="{{ $Endereco->numero }}">
              </div>
          </div>
          <div class="form-group">
              <label for="complemento" class="col-sm-2 control-label furmularioTexto">Complemento</label>
              <div class="formularioImput campoEndereco">
                  <input type="text" class="form-control @error('complemento') campoVermelho @enderror" id="complemento" name="complemento" value="{{ $Endereco->complemento }}">
              </div>
          </div>
      </div>
  <button type="submit" class="btn btn-default cadastrar">Atualizar</button>
      </form>
  </div>
@endsection