@extends('templates.template')

@section('template')
    <div class="formulario">
        <form class="form-inline" method="POST" action="{{ route('pessoa.update' , $Pessoa->id) }}">
            {{ csrf_field() }}
            @method('PUT')
            <div class="pessoa">
                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label furmularioTexto">Nome</label>
                    <div class="formularioImput">
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $Pessoa->nome }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sobrenome" class="col-sm-2 control-label furmularioTexto">Sobrenome</label>
                    <div class="formularioImput">
                        <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{ $Pessoa->sobrenome }}">
                    </div>
                </div>
                <div class="form-group">
                    <select name="sexo"  id="sexo" class="form-control seletorPessoa" required>                                                           
                        <option @if($Pessoa->sexo == 'M') selected @endif value="M">Masculino</option>
                        <option @if($Pessoa->sexo == 'F') selected @endif value="F">Feminino</option>                   
                    </select>
                </div>
                <div class="form-group">
                    <select name="endereco_id"  id="endereco_id" class="form-control seletorPessoa" required>
                        <option value="{{ $Pessoa->relEndereco->id }}">{{ $Pessoa->relEndereco->rua }}</option>
                        @foreach($Endereco as $Endereco)
                            <option value="{{ $Endereco->id }}">{{ $Endereco->rua }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="endereco">
                <div class="form-group">
                    <label for="cep" class="col-sm-2 control-label furmularioTexto">Cep</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control @error('cep') campoVermelho @enderror" id="cep" name="cep" value="{{ $Endereco->cep }}">
                    </div>
                    @error('cep')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label furmularioTexto">Estado</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control" id="estado" name="estado" value="{{ $Endereco->estado }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cidade" class="col-sm-2 control-label furmularioTexto">Cidede</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $Endereco->cidade }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="bairro" class="col-sm-2 control-label furmularioTexto">Bairro</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $Endereco->bairro }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="rua" class="col-sm-2 control-label furmularioTexto">Rua</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control" id="rua" name="rua" value="{{ $Endereco->rua }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="numero" class="col-sm-2 control-label furmularioTexto">Número</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control" id="numero" name="numero" value="{{ $Endereco->numero }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="complemento" class="col-sm-2 control-label furmularioTexto">Complemento</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $Endereco->complemento }}">
                    </div>
                </div>
            </div>
        <button type="submit" class="btn btn-default cadastrar">Atualizar</button>
    </form>
    </div>
@endsection