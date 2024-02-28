@extends('templates.template')

@section('template')
    <div class="formulario">
        <form class="form-horizontal" method="POST" action="{{ route('contato.update' , $Contato->id) }}">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
              <label for="contato" class="col-sm-2 control-label furmularioTexto">Contato</label>
              <div class="formularioImput">
                <input type="text" class="form-control" id="contato" name="contato" value={{    $Contato->contato   }}>
              </div>
            </div>
            <div class="form-group">
                <select name="pessoa_id"  id="pessoa_id" class="form-control seletor" required>
                    <option value="{{ $Contato->contatoPessoa->id }}">{{ $Contato->contatoPessoa->nome }}</option>
                    @foreach($Pessoa as $P)
                        <option value="{{ $P->id }}">{{ $P->nome }}</option>
                    @endforeach
                </select>
            <div class="form-group">           
                <select name="tipo_contato_id"  id="tipo_contato_id" class="form-control seletor" required>
                    <option value="{{ $Contato->contatoTipo->id }}">{{ $Contato->contatoTipo->tipo }}</option>
                    @foreach($TipoContato as $Tipo)
                        <option value="{{ $Tipo->id }}">{{ $Tipo->tipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
              <label for="anotacao" class="col-sm-2 control-label furmularioTexto">Anotação</label>
              <div class="formularioImput">
                <input type="text" class="form-control" id="anotacao" name="anotacao" value={{    $Contato->anotacao   }}>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Atualizar</button>
              </div>
            </div>
          </form>
    </div>
@endsection