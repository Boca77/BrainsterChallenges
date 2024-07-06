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
    </nav>
    <main>
        <div class="container">
            <div class="row">
                <form class="px-5" method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="mb-5">
                        @error('name')
                            <p class="text-white bg-danger">{{ $message }}</p>
                        @enderror
                        <label for="name" class="form-label text-white">NAME</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                            id="name">
                    </div>
                    <div class="mb-5">
                        @error('last-name')
                            <p class="text-white bg-danger w-100">{{ $message }}</p>
                        @enderror
                        <label for="last-name" class="form-label text-white">LAST NAME</label>
                        <input type="text" class="form-control" name="last-name" value="{{ old('last-name') }}"
                            id="last-name">
                    </div>
                    <div class="mb-5">
                        @error('email')
                            <p class="text-white bg-danger">{{ $message }}</p>
                        @enderror
                        <label for="email" class="form-label text-white">EMAIL</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                            id="email">
                    </div>
                    <div class="row px-2"> <button type="submit" class="btn btn-primary">Submit</button></div>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <p>Copyright &#169; Your website 2024</p>
    </footer>
</body>

</html>
