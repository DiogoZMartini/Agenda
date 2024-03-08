@extends('templates.template')

@section('template')
    <div class="mostrar">
        <h1 class="titulo">Visualizar</h1><br>
        <div class="panel panel-default">
            <form class="form-horizontal" method="POST" action="{{ route('contato.store') }}">
                {{ csrf_field() }}
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Preencha Corretamente todos os Campos requeridos
                    </div>
                @endif
                <div class="camposFormularios">
                    <div class="form-group">
                        <label for="contato" class="control-label furmularioTextoShow">Contato</label>
                        <div class="formularioImput formularioImputShow">
                            <input class="form-control" id="disabledInput" type="text" value="{{$Contato->contato}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="anotacao" class="control-label furmularioTextoShow">Tipo</label>
                        <div class="formularioImput formularioImputShow">
                            <input class="form-control" id="disabledInput" type="text" value="{{$Contato->relDominioTipoContato->descricao}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="anotacao" class="control-label furmularioTextoShow">Anotação</label>
                        <div class="formularioImput formularioImputAnotacao ">
                           <p>{{$Contato->anotacao}}</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection