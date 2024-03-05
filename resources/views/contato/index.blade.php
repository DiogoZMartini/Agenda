@extends('templates.template')

@section('template')
    <div class="tabela">
        <h1 class="titulo">Contatos</h1>
        <hr>

        <div>
            <a href="{{ route('contato.create') }}">
                <button class="cadastrar btn btn-primary btn-sm">Cadastrar</button>
            </a>
        </div>
        <form method="get" action="{{ route('contato.index') }}" class="form-inline">
            <div class="form-group">
                <label for="contato" class="sr-only">Contato:</label>
                <input type="text" class="form-control" name="contato" value="{{ $filtro['contato'] ?? '' }}" placeholder="Contato">
            </div>
            <div class="form-group">
                <label class="sr-only" for="sobrenome">Pessoa:</label>
                <input type="text" class="form-control" name="pessoa" value="{{ $filtro['pessoa'] ?? '' }}" placeholder="Pessoa">
            </div>
            <button type="submit" class="btn glyphicon glyphicon-search btn btn-info btnFiltro"></button>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Contato</td>
                    <td>Pessoa</td>
                    <td>Tipo de Contato</td>
                    <td>Anotação</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($Contatos as $Contato)
                    <tr>
                        <td>{{ $Contato->id }}</td>
                        <td>{{ $Contato->contato }}</td>
                        <td>{{ $Contato->relPessoa->nome }}</td>
                        <td>{{ $Contato->contatoTipo->tipo }}</td>
                        <td>{{ $Contato->anotacao }}</td>
                        <td>
                            <a href="{{ route('contato.show', ['id' => $Contato])}}"  >
                                <button class="btn glyphicon glyphicon-eye-open btn-success"></button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('contato.edit', ['Pessoa' => $Contato] )}}">
                                <button class="btn glyphicon glyphicon-pencil btn-primary"></button>
                            </a>
                        </td>
                        <td>
                            <a href="#" data-id="{{ $Contato->id }}" data-toggle="modal" data-target="#excluirModal">
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
                        <p> Confirme a exclusão do Contato ? </p>
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