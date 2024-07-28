<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container">
        <a class="navbar-brand " href="/"><img style="width: 50px" src="{{ asset('images/logo_footer_black.png') }}"
                alt=""></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav align-items-center gap-3">
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="https://brainster.co/full-stack/">Академија за
                        Програмирање</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="https://brainster.co/marketing/">Академија за
                        Маркетинг</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="https://brainster.co/graphic-design/">Академија за
                        Дизајн</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="https://blog.brainster.co/">Блог</a>
                </li>
                <li class="nav-item">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Вработи наш студент
                    </a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Вработи наши студенти
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">Внесете ваши податоци за
                                    да
                                    стапиме во контакт
                                    <form action="{{ route('mail') }}" class="my-2">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Е-мејл
                                            </label>
                                            <input type="email" required class="form-control" name="email"
                                                id="email" aria-describedby="emailHelp">

                                        </div>
                                        <div class="mb-3">
                                            <label for="tel" class="form-label">Телефон
                                            </label>
                                            <input type="tel" required class="form-control" id="tel"
                                                name="tel" aria-describedby="emailHelp">

                                        </div>
                                        <div class="mb-3">
                                            <label for="company" class="form-label">Компанија
                                            </label>
                                            <input type="text" required class="form-control" name="company"
                                                id="company">

                                        </div>
                                        <button type="submit" class="btn w-100 bg-warning">Испрати</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
