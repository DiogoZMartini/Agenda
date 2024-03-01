@extends('templates.template')

@section('template')
    <div class="formulario">
        <form class="form-horizontal" method="POST" action="{{ route('contato.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="contato" class="col-sm-2 control-label furmularioTexto">Contato</label>
                <div class="formularioImput">
                    <input type="text" class="form-control" id="contato" name="contato" placeholder="Contato">
                </div>
            </div>
            <div class="form-group">
                <select name="pessoa_id"  id="pessoa_id" class="form-control seletor" required>
                    <option>Selecione</option>
                    @foreach($Pessoa as $P)
                        <option value="{{ $P->id }}">{{ $P->nome }}</option>
                    @endforeach
                </select>
                <select name="tipo_contato_id"  id="tipo_contato_id" class="form-control seletor" required>
                    <option>Selecione</option>
                    @foreach($TipoContato as $Tipo)
                        <option value="{{ $Tipo->id }}">{{ $Tipo->tipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="anotacao" class="col-sm-2 control-label furmularioTexto">Anotação</label>
                <div class="formularioImput">
                    <input type="text" class="form-control" id="anotacao" name="anotacao" placeholder="Anotação">
                </div>
            </div>
            <button type="submit" class="btn btn-default">Criar</button>
        </form>
    <div>
@endsection