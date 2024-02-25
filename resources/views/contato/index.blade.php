@extends('templates.template')

@section('template')
    <div class="tabela">
        <h1 class="titulo">Contatos</h1>
        <hr>

        <div>
            <a href="{{ route('contato.create') }}">
                <button class="cadastrar btn btn-primary btn-sm">Cadastrar</button>
            </a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Contato</td>
                    <td>Pessoa</td>
                    <td>Tipo de Contato</td>
                    <td>Anotação</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($Contato as $Contato)
                    <tr>
                        <td>{{ $Contato->id }}</td>
                        <td>{{ $Contato->contato }}</td>
                        <td>{{ $Contato->contatoPessoa->nome }}</td>
                        <td>{{ $Contato->contatoTipo->tipo }}</td>
                        <td>{{ $Contato->anotacao }}</td>
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
                        </a>
                            <a href="{{ route('contato.destroy', $Contato->id )}}">
                                <button class="btn glyphicon glyphicon-trash btn btn-danger"></button>
                            </a>
                        </td>
                    </tr>        
                @endforeach
            </tbody>    
        </table>
    </div>
@endsection