@extends('templates.template')

@section('template')
    <div class="formulario formularioEdit">
        <form class="form-inline" method="POST" action="{{ route('contato.update' , $Contato->id) }}">
          {{ csrf_field() }}
          @if($errors->any())
          <div class="alert alert-danger">
              Preencha todos os Campos requeridos
          </div>
          @endif
          @method('PUT')
          <div class="camposFormularios">
            <h4>Alterar Contato</h4>
            <hr>
            <div class="form-group">
              <label for="contato" class="col-sm-2 control-label furmularioTexto">Contato</label>
              <div class="formularioImput">
                <input type="text" class="form-control @error('contato') campoVermelho @enderror" id="contato" name="contato" value={{    $Contato->contato   }}>
              </div>
            </div> 
            <div class="form-group">
              <label for="anotacao" class="col-sm-2 control-label furmularioTexto">Anotação</label>
              <div class="formularioImput">
                <input type="text" class="form-control @error('anotacao') campoVermelho @enderror" id="anotacao" name="anotacao" value={{    $Contato->anotacao   }}>
              </div>
            </div>
            <div class="form-group">           
              <select name="tipo_contato_fk"  id="tipo_contato_fk" class="form-control seletorContato @error('tipo_contato_fk') campoVermelho @enderror" required>
                  @foreach($TipoContatos as $TipoContato)
                    <option @if($TipoContato->id == $Contato->relDominioTipoContato->id) selected @endif value="{{ $TipoContato->id }}">{{ $TipoContato->descricao }}</option>
                  @endforeach
              </select>
            </div> 
              <button type="submit" class="btn btn-default cadastrar">Atualizar</button>
          </div>
        </form>
    </div>
@endsection