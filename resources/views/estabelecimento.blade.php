<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SELEÇÃO VAI BEM - PROGRAMADOR FULL STACK (CASE)</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body >
        
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Content here -->
                    <div class="jumbotron">
                        <h1 class="display-4">Estabelecimentos</h1>
                        <p class="lead">API - CRUD dos estabelecimentos e Busca dos estabelecimento por localização</p>
                        <hr class="my-4">
                        <p>Seleção Vai Bem - PROGRAMADOR FULL STACK (CASE)</p>
                        <img src="{{ asset('images/logo.png') }}" class="img-fluid mx-auto d-block" alt="Responsive image">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
