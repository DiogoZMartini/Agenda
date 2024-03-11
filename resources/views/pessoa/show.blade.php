@extends('templates.template')

@section('template')
    <div class="formulario">
        <form class="form-inline" method="POST">
            {{ csrf_field() }}
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    Preencha Corretamente todos os Campos requeridos
                </div>
            @endif
            <div class="camposFormularios">
                <h4>Dados da Pessoa</h4>
                <hr>
                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label furmularioTexto">Nome</label>
                    <div class="formularioImput">
                        <input class="form-control" id="nome" type="text" value="{{$Pessoa->nome}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sobrenome" class="col-sm-2 control-label furmularioTexto">Sobrenome</label>
                    <div class="formularioImput">
                        <input class="form-control" id="sobrenome" type="text" value="{{$Pessoa->sobrenome}}" disabled>                    
                    </div>
                </div>
                <div class="form-group">
                    <label for="sexo" class="col-sm-2 control-label furmularioTexto">Sexo</label>
                    <div class="formularioImput">
                    <input class="form-control" id="sexo" type="text" value="{{$Pessoa->sexo}}" disabled>
                    </div>
                </div>
            </div>
            <div class="camposFormularios">
                <h4>Endereço da Pessoa</h4>
                <hr>
                <div class="form-group">
                    <label for="cep" class="col-sm-2 control-label furmularioTexto">Cep</label>
                    <div class="formularioImput">
                        <input class="form-control" id="cep" type="text" value="{{$Pessoa->relEndereco->cep}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label furmularioTexto">Estado</label>
                    <div class="formularioImput">
                        <input class="form-control" id="estado" type="text" value="{{$Pessoa->relEndereco->estado}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cidade" class="col-sm-2 control-label furmularioTexto">Cidede</label>
                    <div class="formularioImput">
                        <input class="form-control" id="cidade" type="text" value="{{$Pessoa->relEndereco->cidade}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bairro" class="col-sm-2 control-label furmularioTexto">Bairro</label>
                    <div class="formularioImput">
                        <input class="form-control" id="bairro" type="text" value="{{$Pessoa->relEndereco->bairro}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rua" class="col-sm-2 control-label furmularioTexto">Rua</label>
                    <div class="formularioImput">
                        <input class="form-control" id="rua" type="text" value="{{$Pessoa->relEndereco->rua}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="numero" class="col-sm-2 control-label furmularioTexto">Número</label>
                    <div class="formularioImput campoEndereco">
                        <input class="form-control" id="numero" type="text" value="{{$Pessoa->relEndereco->numero}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="complemento" class="col-sm-2 control-label furmularioTexto">Complemento</label>
                    <div class="formularioImput campoEndereco">
                        <input class="form-control" id="complemento" type="text" value="{{$Pessoa->relEndereco->complemento}}" disabled>
                    </div>
                </div>
                <h4>Lista de Contatos</h4>
                <hr>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Contato</td>
                    <td>Tipo de Contato</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($Pessoa->relContato as $Contato)
                    <tr>
                        <td>{{ $Contato->contato }}</td>
                        <td>{{ $Contato->relDominioTipoContato->descricao}}</td>
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