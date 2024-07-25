@extends('layout.main')

@section('content')
    <div style="background-image: 
    linear-gradient(rgba(0, 0, 0, 0.45),rgba(0, 0, 0, 0.45)),
    url(images/synthesio-0301.gif);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;"
        class="text-white d-flex justify-content-center p-5">
        <div class="p-5 m-5 text-center">
            <h1>Brainster.xyz Labs</h1>
            <p>Проекти од академијата на Brainster</p>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <a href="{{ route('project.show', ['project' => $project->id]) }}" class="text-decoration-none">
                        <div class="card text-center"
                            onMouseOver="this.style.borderColor='orange', this.style.boxShadow='3px 3px 11px 7px #dddddd'"
                            onMouseOut="this.style.borderColor='', this.style.boxShadow=''">
                            <img class="w-50 h-25 mx-auto my-2" src="{{ $project->url }}" alt="">
                            <h2 class="text-body-secondary">{{ $project->title }}</h2>
                            <h5 class="text-body-tertiary">{{ $project->subtitle }}</h5>
                            <p>{{ $project->description }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
