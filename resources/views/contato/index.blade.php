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
                @foreach ($Contato as $Contato)
                    <tr>
                        <td>{{ $Contato->id }}</td>
                        <td>{{ $Contato->contato }}</td>
                        <td>{{ $Contato->contatoPessoa->nome }}</td>
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
                            <a href="#" data-toggle="modal" data-target="#excluirModal{{ $Contato->id }}">
                                <button type="button" class="btn glyphicon glyphicon-trash btn btn-danger"></button>
                            </a>
                        </td>
                    </tr>        
                @endforeach
            </tbody>    
        </table>
    </div>
    <!-- Modal -->
    @if($Pessoa->count() > 0)
        <form id="deletarContato{{$Contato->id}}" method="post" action="{{ route('contato.destroy', $Contato->id) }}">
            @method('DELETE')
            {{ csrf_field() }}
            <div class="modal fade " id="excluirModal{{ $Contato->id }}" tabindex="-1" role="dialog" aria-labelledby="excluirModalLabel">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="excluirModalLabel">Confirmação de exclusão</h4>
                    </div>
                    <div class="modal-body">
                        <p> Confirme a exclusão da pessoa ? </p>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Deletar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
    @endif
@endsection