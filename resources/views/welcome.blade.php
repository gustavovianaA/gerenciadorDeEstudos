<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Gerenciador de Estudos</title>
</head>
<body>

    <header>
        <div class="container">
            @if (Route::has('login'))
            <div class="">
                @auth
                <a href="{{ url('/app/home') }}" class="">Home</a>
                @else
                <a href="{{ route('login') }}" class="">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </header>

    <section class="container" style="height: 90vh">
        <h1 class="mb-4">Gerenciador de Estudos</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('img/app/logo.png') }}">
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>Desenvolvedor: <a href="https://gustavovianadev.com.br" target="_blank">Gustavo Viana</a></p>
        </div>
    </footer>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
