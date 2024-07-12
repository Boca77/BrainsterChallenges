<header class="pb-5 "
    style="background-image: 
    linear-gradient(rgba(0, 0, 0, 0.45),rgba(0, 0, 0, 0.45)),
    url({{ asset($bgUrl) }});
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    ">

    <nav class="navbar navbar-expand-lg navbar-light pb-5 ">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand fw-bold text-white" href="/">Blog</a>
            <div>
                <ul class="navbar-nav ms-auto py-4 py-lg-0 text-uppercase ">
                    <li class="nav-item"><a style="color: #C8C6C5"
                            class="nav-link fw-bold  @if (Route::is('home')) text-white @endif"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item"><a style="color: #C8C6C5"
                            class="nav-link fw-bold @if (Route::is('about')) text-white @endif "
                            href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item"><a style="color: #C8C6C5"
                            class="nav-link fw-bold @if (Route::is('post')) text-white @endif "
                            href="{{ route('post') }}">Sample Post</a>
                    </li>
                    <li class="nav-item"><a style="color: #C8C6C5"
                            class="nav-link fw-bold @if (Route::is('contact')) text-white @endif "
                            href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container text-center mt-5 p-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="text-white @if (Route::is('post')) text-start @else text-center @endif">
                    <h1 class="fw-bold mb-3 display-6">{{ $title }}</h1>
                    @isset($title2)
                        <h1 class="fw-bold mb-3 display-6" style="color: #C8C6C5">{{ $title2 }}</h1>
                    @endisset
                    <p class="fw-bold" style="color: #C8C6C5">{{ $subtitle }}</p>
                </div>
            </div>
        </div>
    </div>
</header>
