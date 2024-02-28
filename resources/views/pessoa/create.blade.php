@extends('templates.template')

@section('template')
    <div class="formulario">
        <form class="form-inline" method="POST" action="{{ route('pessoa.store') }}">
            {{ csrf_field() }}
            <div class="pessoa">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label furmularioTexto">Nome</label>
                <div class="formularioImput">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                </div>
            </div>
            <div class="form-group">
                <label for="sobrenome" class="col-sm-2 control-label furmularioTexto">Sobrenome</label>
                <div class="formularioImput">
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
                </div>
            </div>
            <div class="form-group">
                <select name="sexo"  id="sexo" class="form-control seletorPessoa" required>
                    <option>Selecione</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                </select>
            </div>
            </div>
            <div class="endereco">
                <div class="form-group">
                    <label for="cep" class="col-sm-2 control-label furmularioTexto">Cep</label>
                    <div class="formularioImput campoEndereco">
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Cep">
                    </div>
                </div>
                <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label furmularioTexto">Estado</label>
                    <div class="formularioImput campoEndereco">
                    <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cidade" class="col-sm-2 control-label furmularioTexto">Cidede</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidede">
                    </div>
                </div>
                <div class="form-group">
                    <label for="bairro" class="col-sm-2 control-label furmularioTexto">Bairro</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                    </div>
                </div>
                <div class="form-group">
                    <label for="rua" class="col-sm-2 control-label furmularioTexto">Rua</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua">
                    </div>
                </div>
                <div class="form-group">
                    <label for="numero" class="col-sm-2 control-label furmularioTexto">Número</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control" id="numero" name="numero" placeholder="Número">
                    </div>
                </div>
                <div class="form-group">
                    <label for="complemento" class="col-sm-2 control-label furmularioTexto">Complemento</label>
                    <div class="formularioImput campoEndereco">
                        <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-default cadastrar">Criar</button>
        </form>
    </div>
@endsection