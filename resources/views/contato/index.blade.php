@extends('templates.template')

@section('template')
    <div class="tabela">
        <h1 class="titulo">Contatos</h1>
        <hr>
        <form method="get" action="{{ route('contato.index') }}" class="form-inline">
            <div class="form-group">
                <label for="contato" class="sr-only">Contato:</label>
                <input type="text" class="form-control" name="contato" value="{{ $filtro['contato'] ?? '' }}" placeholder="Contato">
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
                </tr>
            </thead>
            <tbody>
                @foreach ($Contatos as $Contato)
                    <tr>
                        <td>{{ $Contato->id }}</td>
                        <td>{{ $Contato->contato }}</td>
                        <td>{{ $Contato->relPessoa->nome }}</td>
                        <td>{{ $Contato->relDominioTipoContato->descricao}}</td>
                        <td>
                            <a href="{{ route('contato.show', ['id' => $Contato])}}"  >
                                <button class="btn glyphicon glyphicon-eye-open btn-success"></button>
                            </a>
                        </td>
                        <td>
                                <button class="btn glyphicon glyphicon-pencil btn-primary" data-toggle="modal" data-target="#editContatoModal" data-id="{{ $Contato->id }}"></button>
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
    <!-- Modal Excluir-->
        <form id="formExcluirPessoa" method="post" action="{{ route('contato.destroy', 'id') }}">
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
    <!-- Modal Editar-->
    <div class="modal fade" id="editContatoModal" tabindex="-1" role="dialog" aria-labelledby="editContatoModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="editContatoModalLabel">Alteração de pessoa</h4>
            </div>
            <div class="modal-body">
                <form id="formEditContato" class="form-inline">
                    {{ csrf_field() }}
                    @if($errors->any())
                    <div class="alert alert-danger">
                        Preencha todos os Campos requeridos
                    </div>
                    @endif
                    <div class="camposFormularios">
                        <h4>Alterar Contato</h4>
                        <hr>
                        <div class="form-group">
                          <label for="contatoEdit" class="col-sm-2 control-label furmularioTexto">Contato</label>
                          <div class="formularioImput">
                            <input type="text" class="form-control @error('contatoEdit') campoVermelho @enderror" id="contatoEdit" name="contatoEdit">
                          </div>
                        </div> 
                        <div class="form-group">
                          <label for="anotacaoEdit" class="col-sm-2 control-label furmularioTexto">Anotação</label>
                          <div class="formularioImput">
                            <input type="text" class="form-control @error('anotacaoEdit') campoVermelho @enderror" id="anotacaoEdit" name="anotacaoEdit">
                          </div>
                        </div>
                        <div class="form-group">           
                          <select name="tipoContatoFkEdit"  id="tipoContatoFkEdit" class="form-control seletorContato @error('tipoContatoFkEdit') campoVermelho @enderror" required>

                            </select>
                        </div> 
                    </div> 
                <button type="submit" class="btn btn-info cadastrar" id="btnAtualizar">Atualizar</button>
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default voltar" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
@endsection