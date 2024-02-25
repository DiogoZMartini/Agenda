@extends('templates.template')

@section('template')
    <div class="formulario">
        <form class="form-horizontal" method="POST" action="{{ route('pessoa.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label furmularioTexto">Nome</label>
                <div class="formularioImput">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                </div>
            </div>
            <div class="form-group">
                <label for="sobrenome" class="col-sm-2 control-label furmularioTexto">Sobrenome</label>
                <div class="formularioImput">
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
                </div>
            </div>
            <div class="form-group">
                <select name="endereco"  id="endereco" class="form-control seletor" required>
                    <option>Selecione</option>
                    @foreach($Endereco as $Endereco)
                        <option value="{{ $Endereco->id }}">{{ $Endereco->rua }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="sexo"  id="sexo" class="form-control seletor" required>
                    <option>Selecione</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Criar</button>
        </form>
    </div>
@endsection