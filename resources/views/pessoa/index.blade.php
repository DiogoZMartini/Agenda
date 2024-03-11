@extends('templates.template')

@section('template')
    <div class="tabela">
        <h1 class="titulo">Pessoa</h1>
        <hr>

        <div>
            <a href="{{ route('pessoa.create') }}">
                <button class="cadastrar btn btn-primary btn-sm">Cadastrar</button>
            </a>
        </div>
        <form method="get" action="{{ route('pessoa.index') }}" class="form-inline">
            <div class="form-group">
                <label for="nome" class="sr-only">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ $filtro['nome'] ?? '' }}" placeholder="Nome">
            </div>
            <div class="form-group">
                <label class="sr-only" for="sobrenome">Sobrenome:</label>
                <input type="text" class="form-control" name="sobrenome" value="{{ $filtro['sobrenome'] ?? '' }}" placeholder="Sobrenome">
            </div>
            <button type="submit" class="btn glyphicon glyphicon-search btn btn-warning btnFiltro"></button>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Sobrenome</td>
                    <td>Sexo</td>
                    <td>Contato</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($Pessoas as $Pessoa)
                    <tr>
                        <td>{{ $Pessoa->id }}</td>
                        <td>{{ $Pessoa->nome }}</td>
                        <td>{{ $Pessoa->sobrenome }}</td>
                        <td>{{ $Pessoa->sexo }}</td>
                        <td>
                            <a href="{{ route('contato.create', ['id' => $Pessoa])}}"  >
                                <button class="btn glyphicon glyphicon-plus btn-info"></button>
                            </a>
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#visualizarModal" data-id="{{ $Pessoa->id }}">
                                <button class="btn glyphicon glyphicon-eye-open btn-success"></button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('pessoa.edit', ['Pessoa' => $Pessoa] )}}">
                                <button class="btn glyphicon glyphicon-pencil btn-primary"></button>
                            </a>
                        </td>
                        <td>
                            <a href="#" data-id="{{ $Pessoa->id }}" data-toggle="modal" data-target="#excluirModal">
                                <button type="button" class="btn glyphicon glyphicon-trash btn btn-danger"></button>
                            </a>
                        </td>
                    </tr>        
                @endforeach
            </tbody>    
        </table>
    </div>
    <!-- Modal Excluir -->
        <form id="formExcluirPessoa" method="post" action="{{ route('pessoa.destroy', 'id') }}">
            @method('DELETE')
            {{ csrf_field() }}
            <div class="modal fade " id="excluirModal" tabindex="-1" role="dialog" aria-labelledby="excluirModalLabel">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="excluirModalLabel">Confirmação de exclusão</h4>
                    </div>
                    <div class="modal-body">
                        <p> Confirme a exclusão da pessoa ? </p>
                    </div>
                    <input type="hidden" name="id" id="id" value="">
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
    <!-- Modal Visualizar-->
        <form id="formVisualisarPessoa">
            {{ csrf_field() }}
            <div class="modal fade " id="visualizarModal" tabindex="-1" role="dialog" aria-labelledby="visualizarModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="camposFormularios">
                            <h4>Dados da Pessoa</h4>
                            <hr>
                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label furmularioTexto">Nome</label>
                                <div class="formularioImput">
                                    <input class="form-control" id="nome" type="text" name="nome" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sobrenome" class="col-sm-2 control-label furmularioTexto">Sobrenome</label>
                                <div class="formularioImput">
                                    <input class="form-control" id="sobrenome" type="text" name="sobrenome" disabled>                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sexo" class="col-sm-2 control-label furmularioTexto">Sexo</label>
                                <div class="formularioImput">
                                    <input class="form-control" id="sexo" type="text" name="sexo" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="camposFormularios">
                            <h4>Endereço da Pessoa</h4>
                            <hr>
                            <div class="form-group">
                                <label for="cep" class="col-sm-2 control-label furmularioTexto">Cep</label>
                                <div class="formularioImput">
                                    <input class="form-control" id="cep" type="text" name="cep" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="estado" class="col-sm-2 control-label furmularioTexto">Estado</label>
                                <div class="formularioImput">
                                    <input class="form-control" id="estado" type="text" name="estado" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cidade" class="col-sm-2 control-label furmularioTexto">Cidede</label>
                                <div class="formularioImput">
                                    <input class="form-control" id="cidade" type="text" name="cidade" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bairro" class="col-sm-2 control-label furmularioTexto">Bairro</label>
                                <div class="formularioImput">
                                    <input class="form-control" id="bairro" type="text" name="{{$Pessoa->relEndereco->bairro}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rua" class="col-sm-2 control-label furmularioTexto">Rua</label>
                                <div class="formularioImput">
                                    <input class="form-control" id="rua" type="text" name="rua" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="numero" class="col-sm-2 control-label furmularioTexto">Número</label>
                                <div class="formularioImput campoEndereco">
                                    <input class="form-control" id="numero" type="text" name="numero" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="complemento" class="col-sm-2 control-label furmularioTexto">Complemento</label>
                                <div class="formularioImput campoEndereco">
                                    <input class="form-control" id="complemento" type="text" name="complemento" disabled>
                                </div>
                            </div>
                            <h4>Lista de Contatos</h4>
                            <hr>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>Contato</td>
                                    <td>Tipo de Contato</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ()
                                    
                                @endforeach
                            </tbody>    
                        </table>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection