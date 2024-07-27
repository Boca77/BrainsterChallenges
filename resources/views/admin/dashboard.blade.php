@extends('layout.main')

@section('content')
    <div class="container-lg mt-3 px-4">
        <div class="row">
            {{-- <a href="{{ route('logout') }}">Log Out</a> --}}
            <div class="col-lg-1 col-md-2 col-sm-3 col-3 p-0 text-center">
                <p id="add"
                    class="mb-0 border border-top-0 border-start-0 border-end-0 border-bottom border-2 rounded-top p-1">
                    <a href="#add" class="text-decoration-none" style="color: inherit">
                        Додај
                    </a>
                </p>
            </div>

            <div class="col-lg-1 col-md-2 col-sm-3 col-3 p-0 text-center">
                <p id="edit" class="mb-0 border border-bottom-0 border-2 rounded-top p-1">
                    <a href="#edit" class="text-decoration-none" style="color: inherit">Измени
                    </a>
                </p>
            </div>

            <div class="col-lg-10 col-md-8 col-sm-6 col-6 border-bottom border-2 p-0"></div>
        </div>
    </div>

    <div id="edit-section" class="container mt-3">

        <h2 class="py-3">Измени постоечки производ:</h2>

        <div class="row ">

            @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">

                    <div class="card text-center" data-id="{{ $project->id }}"
                        onMouseOver="this.style.borderColor='orange', this.style.boxShadow='3px 3px 11px 7px #dddddd'"
                        onMouseOut="this.style.borderColor='', this.style.boxShadow=''">

                        <div class="display-card" data-id="{{ $project->id }}-display">

                            <img class="w-50 h-25 mx-auto my-2" src="{{ $project->url }}" alt="">
                            <h2 class="text-body-secondary">{{ $project->title }}</h2>
                            <h5 class="text-body-tertiary">{{ $project->subtitle }}</h5>
                            <p>{{ $project->description }}</p>

                            <div data-id="{{ $project->id }}-btn" class="bg-light p-3 border-top border-2 d-none">

                                <button class="px-3 border-2 border rounded" data-id="{{ $project->id }}-editbtn">
                                    <i class="fa-solid fa-xl fa-square-pen"></i>
                                </button>

                                <button type="button" class="px-3 border-2 border rounded" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $project->id }}P" data-id="{{ $project->id }}-delbtn">
                                    <i class="fa-solid fa-xmark fa-xl"></i>
                                </button>

                            </div>

                        </div>

                        <div class="edit-card  text-start d-none" data-id="{{ $project->id }}-edit">

                            <form action="{{ route('edit.project', ['project' => $project->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="p-2">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Име</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            value="{{ $project->title }}">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="subtitle" class="form-label">Поднаслов</label>
                                        <input type="text" name="subtitle" class="form-control" id="subtitle"
                                            value="{{ $project->subtitle }}">
                                        @error('subtitle')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Слика</label>
                                        <input type="url" name="image" class="form-control" placeholder='https://'
                                            id="image" value="{{ $project->image }}">
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="url" class="form-label">URL</label>
                                        <input type="url" name="url" class="form-control" placeholder='https://'
                                            id="url" value="{{ $project->url }}">
                                        @error('url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Опис</label>
                                        <textarea name="description" id="description" class="form-control" rows="3">{{ $project->description }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div data-id="{{ $project->id }}-btn"
                                    class="bg-light p-3 text-center border-top border-2">
                                    <input type="submit" class="px-3 border-2 border rounded" value="Зачувај">
                                    <button class="px-3 border-2 border rounded"
                                        data-id="{{ $project->id }}-cancel">Откажи</button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

                <div class="modal fade" id="exampleModal{{ $project->id }}P" tabindex="-1"
                    aria-labelledby="exampleModal{{ $project->id }}PLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModal{{ $project->id }}PLabel">Избриши</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Дали сте сигурни дека сакате да го избришите производот?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Одкажи</button>
                                <form action="{{ route('delete.project', ['project' => $project->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submite" class="btn btn-warning text-black">Избриши</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <div id="add-form" class="container mt-3 d-none">
        <div class="row">
            <h2 class="py-3 mb-5">Додај нов производ:</h2>
            <div class="col-6 offset-3">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if (!$errors->isEmpty())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>

            <div class="col-6 offset-3">
                <form action="{{ route('add.project') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Име</label>
                        <input type="text" name="title" class="form-control" id="title"
                            value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Поднаслов</label>
                        <input type="text" name="subtitle" class="form-control" id="subtitle"
                            value="{{ old('subtitle') }}">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Слика</label>
                        <input type="url" name="image" class="form-control" placeholder='https://' id="image"
                            value="{{ old('image') }}">
                    </div>

                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="url" name="url" class="form-control" placeholder='https://' id="url"
                            value="{{ old('url') }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Опис</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 text-black">Додај</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let addBtn = document.getElementById('add');
        let editBtn = document.getElementById('edit');
        let edit = document.getElementById('edit-section');
        let add = document.getElementById('add-form');
        let cards = document.querySelectorAll('.card');
        let borderAround = ['border-bottom-0', 'text-muted'];
        let borderBottom = ['border-top-0', 'border-start-0', 'border-end-0', 'border-bottom', 'text-primary']
        window.location.hash = localStorage.getItem("hash") || 'edit';


        function router() {
            hash = window.location.hash.slice(1);

            if (hash == 'edit') {
                edit.classList.remove('d-none')

                editBtn.classList.add(...borderAround);
                editBtn.classList.remove(...borderBottom);

                add.classList.add('d-none');

                addBtn.classList.remove(...borderAround);
                addBtn.classList.add(...borderBottom);

                localStorage.setItem("hash", "edit");
            }

            if (hash == 'add') {
                edit.classList.add('d-none')

                editBtn.classList.remove(...borderAround)
                editBtn.classList.add(...borderBottom)

                add.classList.remove('d-none')

                addBtn.classList.add(...borderAround)
                addBtn.classList.remove(...borderBottom)

                localStorage.setItem("hash", "add");
            }
        }
        cards.forEach(card => {
            const cardId = card.dataset.id;
            const displayCard = document.querySelector(`[data-id='${cardId}-display']`);
            const editCard = document.querySelector(`[data-id='${cardId}-edit']`);
            const btnDiv = document.querySelector(`[data-id='${cardId}-btn']`);
            const editCardBtn = document.querySelector(`[data-id='${cardId}-editbtn']`);
            const delBtn = document.querySelector(`[data-id='${cardId}-del']`);
            const cancelBtn = document.querySelector(`[data-id='${cardId}-cancel']`);
            editCard.classList.add('d-none');

            card.addEventListener('mouseover', (e) => {
                btnDiv.classList.remove('d-none');
            })

            card.addEventListener('mouseout', (e) => {
                btnDiv.classList.add('d-none');
            })

            editCardBtn.addEventListener('click', () => {
                displayCard.classList.add('d-none');
                editCard.classList.remove('d-none');
            })

            cancelBtn.addEventListener('click', (e) => {
                e.preventDefault();
                displayCard.classList.remove('d-none');
                editCard.classList.add('d-none');
            })
        });


        window.addEventListener('hashchange', router);
        window.addEventListener('load', router);
    </script>
@endsection
