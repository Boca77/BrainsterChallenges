@extends('layout.main')

@section('content')
    <div class="container mt-3 px-4">
        <div class="row">
            <div class="col-1 p-0 text-center">
                <p id="add"
                    class="mb-0 border border-top-0 border-start-0 border-end-0 border-bottom border-2 rounded-top p-1 ">
                    <a href="#add" class="text-decoration-none" style="color: inherit">
                        Додај
                    </a>
                </p>
            </div>
            <div class="col-1 p-0 text-center">
                <p id="edit" class="mb-0 border border-bottom-0 border-2 rounded-top p-1 
                ">
                    <a href="#edit" class="text-decoration-none" style="color: inherit">Измени
                    </a>
                </p>
            </div>
            <div class="col-10 border-bottom border-2 p-0"></div>
        </div>
    </div>
    <div id="edit-section" class="container mt-3">
        <h2 class="py-3">Измени постоечки производ:</h2>
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-4 my-2">
                    <a href="{{ route('project.show', ['project' => $project->id]) }}" class="text-decoration-none">
                        <div class="card text-center"
                            onMouseOver="this.style.borderColor='orange', this.style.boxShadow='3px 3px 11px 7px #dddddd'"
                            onMouseOut="this.style.borderColor='', this.style.boxShadow=''">
                            <img class="w-50 h-25 mx-auto my-2" src="{{ $project->image }}" alt="">
                            <h2 class="text-body-secondary">{{ $project->title }}</h2>
                            <h5 class="text-body-tertiary">{{ $project->subtitle }}</h5>
                            <p>{{ $project->description }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div id="add-form" class="container mt-3 d-none">
        <div class="row">
            <h2 class="py-3 mb-5">Додај нов производ:</h2>
            <div class="col-6 offset-3">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Име</label>
                        <input type="text" name="title" class="form-control" id="title"
                            value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Поднаслов</label>
                        <input type="text" name="subtitle" class="form-control" id="subtitle"
                            value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Слика</label>
                        <input type="url" name="image" class="form-control" placeholder='https://' id="image"
                            value="{{ old('image') }}">
                    </div>

                    <div class="mb-3">
                        <label for="img_url" class="form-label">URL</label>
                        <input type="url" name="img_url" class="form-control" placeholder='https://' id="img_url"
                            value="{{ old('img_url') }}">
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
        let borderAround = ['border-bottom-0', 'text-muted'];
        let borderBottom = ['border-top-0', 'border-start-0', 'border-end-0', 'border-bottom', 'text-primary']

        function router() {
            const hash = window.location.hash.slice(1);

            if (hash == 'edit') {
                edit.classList.remove('d-none')

                editBtn.classList.add(...borderAround);
                editBtn.classList.remove(...borderBottom);

                add.classList.add('d-none');

                addBtn.classList.remove(...borderAround);
                addBtn.classList.add(...borderBottom);
            }

            if (hash == 'add') {
                edit.classList.add('d-none')

                editBtn.classList.remove(...borderAround)
                editBtn.classList.add(...borderBottom)

                add.classList.remove('d-none')

                addBtn.classList.add(...borderAround)
                addBtn.classList.remove(...borderBottom)
            }
        }

        window.addEventListener('hashchange', router);
        window.addEventListener('load', router);
    </script>
@endsection
