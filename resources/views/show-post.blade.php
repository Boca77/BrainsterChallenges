@extends('layouts.app')

@section('content')
    {{-- Selected post display --}}
    <div class="container bg-white border rounded">
        <div class="row">
            <div class="col-12 text-end px-5 py-4">
                <p class="text-body-tertiary">{{ $post->category->name }} | {{ $post->user->username }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-6 offset-3">
                <img src="{{ asset(str_replace('public/', 'storage/', $post->image)) }}" style="max-width: 100%"
                    class="image-fluid" alt="">
            </div>
        </div>

        <div class="row mt-5 mb-3">
            <div class="col-6 offset-3">
                <h3>{{ $post->title }}</h3>
                <p class="text-body-tertiary">{{ $post->description }}</p>
            </div>
        </div>
    </div>

    {{-- Comments section --}}
    <div class="container">
        <div class="row my-4">
            <div class="col">
                <h2>Comments:</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="{{ route('add.comment', $post->id) }}" class="btn btn-secondary">Add comment</a>
            </div>
        </div>
    </div>

    {{-- Comments from users --}}
    @if ($comments)
        <div class="container mt-4 p-0">
            @foreach ($comments as $comment)
                <div class="p-3 rounded bg-white border my-2">

                    <div class="row">
                        <div class="col"> {{ $comment->user->username }} says:</div>
                        <div class="col text-end text-body-tertiary fw-bold"> {{ $comment->created_at }}</div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p class="d-inline me-2">{{ $comment->content }}</p>

                            {{-- Checks if the authenticated user is admin or does he have posts --}}
                            @if (auth()->check())
                                @php
                                    $user = auth()->user();
                                    $canEditOrDelete = $user->userHasComments($comment->user->id) || $user->isAdmin();
                                @endphp

                                @if ($canEditOrDelete)
                                    <a href="{{ route('edit.comment', $comment->id) }}"
                                        class="text-black text-decoration-none">
                                        <i class="fa-solid fa-md fa-pen-to-square"></i>
                                    </a>

                                    <form class="d-inline" action="{{ route('delete.comment', $comment->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn d-inline p-0">
                                            <i class="fa-solid fa-md fa-trash-can"></i>
                                        </button>
                                    </form>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @endif

@endsection
