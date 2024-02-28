@extends('templates.template')

@section('template')
    <div class="tabela">
        <h1 class="titulo">DominioTipoContato</h1>
        <hr>

        <div>
            <a href="{{ route('dominio.tipo.contato.create') }}">
                <button class="cadastrar btn btn-primary btn-sm">Cadastrar</button>
            </a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Tipo</td>
                    <td>Descrição</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($DominioTipoContato as $DmTipoContato)
                    <tr>
                        <td>{{ $DmTipoContato->id }}</td>
                        <td>{{ $DmTipoContato->tipo }}</td>
                        <td>{{ $DmTipoContato->descricao }}</td>
                        <td>
                            <a href="{{ route('dominio.tipo.contato.show', ['id' => $DmTipoContato] )}}"  >
                                <button class="btn glyphicon glyphicon-eye-open btn-success"></button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('dominio.tipo.contato.edit', ['DominioTipoContato' => $DmTipoContato] )}}">
                                <button class="btn glyphicon glyphicon-pencil btn-primary"></button>
                            </a>
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#excluirModal{{ $DmTipoContato->id }}">
                                <button type="button" class="btn glyphicon glyphicon-trash btn btn-danger"></button>
                            </a>
                        </td>
                    </tr>        
                @endforeach
            </tbody>    
        </table>
    </div>
    <!-- Modal -->
    <form id="deletarDmTipoContato{{$DmTipoContato->id}}" method="post" action="{{ route('dominio.tipo.contato.destroy', $DmTipoContato->id) }}">
        @method('DELETE')
        {{ csrf_field() }}
        <div class="modal fade " id="excluirModal{{ $DmTipoContato->id }}" tabindex="-1" role="dialog" aria-labelledby="excluirModalLabel">
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
@endsection