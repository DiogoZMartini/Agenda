@extends('templates.template')

@section('template')
    <div class="formulario formularioEdit">
        <form class="form-inline" method="POST" action="{{ route('pessoa.update' , $Pessoa->id) }}">
            {{ csrf_field() }}
            @method('PUT')
            @if($errors->any())
            <div class="alert alert-danger">
                Preencha todos os Campos requeridos
            </div>
            @endif
            <div class="camposFormularios">
                <h4>Dados da Pessoa</h4>
                <hr>
                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label furmularioTexto">Nome</label>
                    <div class="formularioImput">
                        <input type="text" class="form-control @error('nome') campoVermelho @enderror" id="nome" name="nome" value="{{ $Pessoa->nome }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sobrenome" class="col-sm-2 control-label furmularioTexto">Sobrenome</label>
                    <div class="formularioImput">
                        <input type="text" class="form-control @error('sobrenome') campoVermelho @enderror" id="sobrenome" name="sobrenome" value="{{ $Pessoa->sobrenome }}">
                    </div>
                </div>
                <div class="form-group">
                    <select name="sexo"  id="sexo" class="form-control seletorPessoa @error('sexo') campoVermelho @enderror" required>                                                           
                        <option @if($Pessoa->sexo == 'Masculino') selected @endif value="Masculino">Masculino</option>
                        <option @if($Pessoa->sexo == 'Femenino') selected @endif value="Femenino">Feminino</option>                   
                    </select>
                </div>
            </div>
        <button type="submit" class="btn btn-default cadastrar">Atualizar</button>
    </form>
    </div>
@endsection