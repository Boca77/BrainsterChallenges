<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="d-flex flex-column justify-content-between vh-100">
    <header>
        <h1>Buissnes Casual</h1>
    </header>
    <nav>
        <a class="text-decoration-none" href="{{ route('index') }}">Home</a>
        <a class="text-decoration-none text-white" href="{{ route('login') }}">Log in</a>
        @isset($user)
            <a class="text-decoration-none text-white" href="{{ route('logout') }}">Log out</a>
        @endisset
    </nav>
    <main>
        <div class="container">
            <div class="row text-white">
                <p class="display-6">Your Name is: {{ $user['name'] }}</p>
                <p class="display-6">Your Last Name is: {{ $user['last-name'] }}</p>
                @isset($user['email'])
                    <p class="display-6">Your Email is: {{ $user['email'] }}</p>
                @endisset
            </div>
        </div>
    </main>
    <footer>
        <p>Copyright &#169; Your website 2024</p>
    </footer>
</body>

</html>
