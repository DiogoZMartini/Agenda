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
            <button type="submit" class="btn glyphicon glyphicon-search btn btn-info btnFiltro"></button>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Sobrenome</td>
                    <td>Endereco</td>
                    <td>Sexo</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($Pessoas as $Pessoa)
                    <tr>
                        <td>{{ $Pessoa->id }}</td>
                        <td>{{ $Pessoa->nome }}</td>
                        <td>{{ $Pessoa->sobrenome }}</td>
                        <td>{{ $Pessoa->endereco_id }}</td>
                        <td>{{ $Pessoa->sexo }}</td>
                        <td>
                            <a href="{{ route('pessoa.show', ['id' => $Pessoa])}}"  >
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
    <!-- Modal -->
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
@endsection