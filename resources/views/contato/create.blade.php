@extends('templates.template')

@section('template')
    <div class="formulario">
        <form class="form-horizontal" method="POST" action="{{ route('contato.store') }}">
            {{ csrf_field() }}
            @if($errors->any())
            <div class="alert alert-danger">
                Preencha todos os Campos requeridos
            </div>
            @endif
            <div class="form-group">
                <label for="contato" class="col-sm-2 control-label furmularioTexto">Contato</label>
                <div class="formularioImput">
                    <input type="text" class="form-control @error('contato') campoVermelho @enderror" id="contato" name="contato" placeholder="Contato" value="{{ old('contato') }}">
                </div>
            </div>
            <div class="form-group">
                <select name="pessoa_id"  id="pessoa_id" class="form-control seletor @error('pessoa_id') campoVermelho @enderror" required>
                    <option value="" {{ old('pessoa_id') == '' ? 'selected' : '' }}>Selecione</option>
                    @foreach($Pessoa as $P)
                        <option value="{{ $P->id }}" {{ old('pessoa_id') == $P->id ? 'selected' : '' }}>{{ $P->nome }}</option>
                    @endforeach
                </select>
                <select name="tipo_contato_id"  id="tipo_contato_id" class="form-control seletor @error('tipo_contato_id') campoVermelho @enderror" required>
                    <option value="" {{ old('tipo_contato_id') == '' ? 'selected' : '' }}>Selecione</option>
                    @foreach($TipoContato as $Tipo)
                        <option value="{{ $Tipo->id }}" {{ old('tipo_contato_id') == $Tipo->id ? 'selected' : '' }}>{{ $Tipo->tipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="anotacao" class="col-sm-2 control-label furmularioTexto">Anotação</label>
                <div class="formularioImput">
                    <input type="text" class="form-control @error('anotacao') campoVermelho @enderror" id="anotacao" name="anotacao" placeholder="Anotação" value="{{ old('anotacao') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-default">Criar</button>
        </form>
    <div>
@endsection