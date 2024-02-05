@extends('templates.template')
@section('template')
    <h1>Visualizar</h1>
    <div>
        @php
            $pessoa=$contato->find($contato->id)->contatoPessoa;
            $endereco=$pessoa->find($pessoa->id)->pessoaEndereco;
            $dominio=$contato->find($contato->id)->contatoTipo;

        @endphp
        Nome : {{$pessoa->nome}};
        Sobrenome : {{$pessoa->sobrenome}};
        Cep : {{$endereco->cep}};
        Rua : {{$endereco->rua}};
        Bairro : {{$endereco->bairro}};
        Cidade : {{$endereco->cidade}};
        Estado : {{$endereco->estado}};
        Contato : {{$dominio->descricao}}: {{$contato->contato}};
        Complemento : {{$endereco->complemento}};
        Anotação: {{$contato->anotacao}};
    </div>
@endsection