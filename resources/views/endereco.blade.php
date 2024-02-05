@extends('templates.template')
@section('template')
    <h1>Endereços</h1>
    <div>
        <a href="{{ route('enderecos.create') }}">
            <button>Cadastrar</button>
        </a>
    </div>

    <div>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Cep</th>
                <th scope="col">Rua</th>
                <th scope="col">Bairro</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Complemento</th>
              </tr>
            </thead>
            <tbody>
            @foreach($endereco as $endereco)
             <tr>
                <th scope="row">{{$endereco->id}}</th>
                <td>{{$endereco->cep }}</td>
                <td>{{$endereco->rua}}</td>
                <td>{{$endereco->bairro}}</td>
                <td>{{$endereco->cidade}}</td>
                <td>{{$endereco->estado}}</td>
                <td>{{$endereco->complemento}}</td>

                    <a href=""  >
                         <button>Visualizar</button>
                    </a>

                    <a href="">
                        <button>Edit</button>
                   </a>

                   <a href="" class="js-del">
                    <button>Deletar</button>
                    </a>
             </tr>
            @endforeach
            </tbody>
          </table>
    </div>
@endsection