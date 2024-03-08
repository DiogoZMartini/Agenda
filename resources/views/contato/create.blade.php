@extends('templates.template')

@section('template')
    <div class="formulario formularioEdit">
        <form class="form-inline" method="POST" action="{{ route('contato.store') }}">
            {{ csrf_field() }}
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    Preencha Corretamente todos os Campos requeridos
                </div>
            @endif
            <div class="camposFormularios">
                <h4>Adicionar um Contato</h4>
                <hr>
                <div class="form-group">
                    <label for="contato" class="col-sm-2 control-label furmularioTexto">Contato</label>
                    <div class="formularioImput">
                        <input type="text" class="form-control @error('contato') campoVermelho @enderror" id="contato" name="contato" placeholder="Contato" value="{{ old('contato') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="anotacao" class="col-sm-2 control-label furmularioTexto">Anotação</label>
                    <div class="formularioImput">
                        <input type="text" class="form-control @error('anotacao') campoVermelho @enderror" id="anotacao" name="anotacao" placeholder="Anotação" value="{{ old('anotacao') }}">
                    </div>
                </div>
                <div class="form-group">
                    <select name="tipo_contato_fk"  id="tipo_contato_fk" class="form-control seletorContato @error('tipo_contato_fk') campoVermelho @enderror" required>
                        <option value="" {{ old('tipo_contato_fk') == '' ? 'selected' : '' }}>Selecione</option>
                        @foreach($TipoContatos as $TipoContato)
                            <option value="{{ $TipoContato->id }}" {{ old('tipo_contato_fk') == $TipoContato->id ? 'selected' : '' }}>{{ $TipoContato->descricao }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" class="form-control" id="pessoa_fk" name="pessoa_fk" value="{{$Pessoa->id}}">
                <button type="submit" class="btn btn-default cadastrar">Adicionar</button>
            </div>
        </form>
    <div>
@endsection