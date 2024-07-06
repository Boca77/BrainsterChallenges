<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Buissnes Casual</h1>
    </header>
    <nav>
        <a href="{{ route('index') }}">Home</a>
        <a href="{{ route('login') }}">Log in</a>
        @isset($user)
            <a href="{{ route('logout') }}">Log out</a>
        @endisset
    </nav>
    <main>
        <div class="container1">
            <div class="item-l">
                <h4 class="upper">lorem ipsum</h4>
                <p class="title">lorem ipsum</p>
                <p class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis, ullam a assumenda
                    tempora
                    mollitia, quisquam nulla sit, corporis esse itaque sapiente laboriosam eum quas suscipit
                    consequuntur. Magnam repellat iste totam.</p>
                <button>Visit us today</button>
            </div>
            <div class="item-r"><img src="{{ asset('img/cafe.jpg') }}" alt=""></div>
        </div>
        <div class="container2">
            <div class="wrap">
                <div class="item">
                    <h4>Our Promise</h4>
                    <p class="title">To @if (isset($user['name']) && isset($user['last-name']))
                            {{ $user['name'] }} {{ $user['last-name'] }}
                        @else
                            you
                        @endif
                    </p>
                    <p class="text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum harum amet
                        impedit, dolorum
                        architecto saepe doloremque itaque autem porro illo asperiores iure quia consequuntur vero sed
                        sint
                        est aliquam, earum cupiditate veritatis similique facere illum! Placeat optio excepturi esse
                        soluta
                        amet quod explicabo aliquid, nam cupiditate fuga omnis a doloremque?</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>Copyright &#169; Your website 2024</p>
    </footer>
</body>

</html>
