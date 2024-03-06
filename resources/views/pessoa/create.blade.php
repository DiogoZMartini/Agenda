@extends('templates.template')

@section('template')
    <div class="formulario">
        <form class="form-inline" method="POST" action="{{ route('pessoa.store') }}">
            {{ csrf_field() }}
            @if($errors->any())
                <div class="alert alert-danger">
                    Preencha todos os Campos requeridos
                </div>
            @endif
            <div class="pessoa">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label furmularioTexto">Nome</label>
                <div class="formularioImput">
                    <input type="text" class="form-control @error('nome') campoVermelho @enderror" id="nome" name="nome" placeholder="Nome" value="{{ old('nome') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="sobrenome" class="col-sm-2 control-label furmularioTexto">Sobrenome</label>
                <div class="formularioImput">
                    <input type="text" class="form-control @error('sobrenome') campoVermelho @enderror" id="sobrenome" name="sobrenome" placeholder="Sobrenome" value="{{ old('sobrenome') }}">
                </div>
            </div>
            <div class="form-group">
                <select name="sexo"  id="sexo" class="form-control seletorPessoa @error('sexo') campoVermelho @enderror" required>
                    <option >Selecione</option>
                        <option value="M" @if(old('sexo') == 'M') selected @endif>Masculino</option>
                        <option value="F" @if(old('sexo') == 'F') selected @endif>Feminino</option> 
                </select>
            </div>
            </div>
            <div class="endereco">
                <div class="form-group">
                    <label for="cep" class="col-sm-2 control-label furmularioTexto">Cep</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control @error('cep') campoVermelho @enderror" id="cep" name="cep" placeholder="Cep" value="{{ old('cep') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label furmularioTexto">Estado</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control @error('estado') campoVermelho @enderror" id="estado" name="estado" placeholder="Estado" value="{{ old('estado') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cidade" class="col-sm-2 control-label furmularioTexto">Cidede</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control @error('cidade') campoVermelho @enderror" id="cidade" name="cidade" placeholder="Cidede" value="{{ old('cidade') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="bairro" class="col-sm-2 control-label furmularioTexto">Bairro</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control @error('bairro') campoVermelho @enderror" id="bairro" name="bairro" placeholder="Bairro" value="{{ old('bairro') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="rua" class="col-sm-2 control-label furmularioTexto">Rua</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control @error('rua') campoVermelho @enderror" id="rua" name="rua" placeholder="Rua" value="{{ old('rua') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="numero" class="col-sm-2 control-label furmularioTexto">Número</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control @error('numero') campoVermelho @enderror" id="numero" name="numero" placeholder="Número" value="{{ old('numero') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="complemento" class="col-sm-2 control-label furmularioTexto">Complemento</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento" value="{{ old('complemento') }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-default cadastrar">Criar</button>
        </form>
    </div>
@endsection