<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body class="fundo">
    <main class="container main">
        <nav class="navbar navbar-default sidebar menu">
            <ul class="nav">
                <li class="logo"><img src="{{ asset('logo.png') }}" class="imagem"></li>
                <li role="presentation" class="opcoes"><a href="{{ route('contato.index')}}">Contatos</a></li>
                <li role="presentation" class="opcoes"><a href="{{ route('pessoa.index')}}">Pessoas</a></li>
            </ul>
        </nav>
        @yield('template')
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/excluir.js') }}"></script>
    <script src="{{ asset('js/editar.js') }}"></script>
    <script src="{{ asset('js/editarContato.js') }}"></script>
    <script src="{{ asset('js/visualizar.js') }}"></script>
    <script src="{{ asset('js/cadastrarContato.js') }}"></script>
    <script src="{{ asset('js/visualizarContato.js') }}"></script>
</body>
</html>