@extends('layout.main')

@section('title', 'Project Showcase')

@section('content')
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col-6 offset-3">
                <img src="{{ $project->url }}" class="mb-3" alt="">
                <h1>{{ $project->title }}</h1>
                <h5>{{ $project->subtitle }}</h5>
                <p>{{ $project->description }}</p>
            </div>
        </div>
    </div>
@endsection
