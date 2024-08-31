@extends('layouts.app')

@section('content')
    {{-- Success message --}}
    @if (session()->has('success'))
        <div class="container">
            <div class="row mt-2">
                <div class="alert alert-success text-success fw-bold">
                    {{ session()->get('success') }}
                </div>
            </div>
        </div>
    @endif


    {{-- Unapproved Posts --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4 mb-3">
                <h1 class="text-center">Unapproved Posts</h1>
            </div>
        </div>

        {{-- Unapproved Posts Display --}}
        <div class="container mt-2">
            <div class="row">
                @forelse($posts as $post)
                    <div class="row align-items-center my-2 border rounded py-4 px-5 bg-white">

                        <a href="{{ route('show.post', $post->id) }}"
                            class="col-12 col-sm-3 col-md-2 col-lg-1 text-center p-0 mb-2 mb-sm-0 text-decoration-none text-black">
                            <img style="max-width: 100%" class="image-fluid"
                                src="{{ asset(str_replace('public/', 'storage/', $post->image)) }} " alt="">
                        </a>

                        <a href="{{ route('show.post', $post->id) }}"
                            class="col-12 col-sm-6 col-md-8 col-lg-8 align-items-center px-3 mb-2 mb-sm-0 text-decoration-none text-black">
                            <div>
                                <h5>{{ $post->title }}</h5>
                                <p class="mb-0 text-body-tertiary">{{ $post->description }}</p>
                            </div>
                        </a>

                        <div class="col-12 col-sm-3 col-md-2 col-lg-1 mb-2 mb-sm-0 text-end">

                            {{-- Checks if the authenticated user is admin or does he have posts --}}
                            <form class="d-inline" action="{{ route('approve.post', $post->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <button class="btn d-inline p-0">
                                    <i class="fa-sharp fa-md fa-solid fa-check"></i>
                                </button>
                            </form>


                            <a href="{{ route('edit.post', $post->id) }}" class="text-black text-decoration-none">
                                <i class="fa-solid fa-md fa-pen-to-square"></i>
                            </a>

                            <form class="d-inline" action="{{ route('delete.post', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn d-inline p-0">
                                    <i class="fa-solid fa-md fa-trash-can"></i>
                                </button>
                            </form>

                        </div>

                        <div class="col-12 col-lg-2 text-center">
                            <p class="mb-0 text-body-tertiary">{{ $post->user->username }}|{{ $post->category->name }}</p>
                        </div>
                    </div>
                @empty

                    {{-- Message if no posts in database --}}
                    <h4 class="text-center text-body-tertiary ">Nothing to approve yet!</h4>
                @endforelse
            </div>
        </div>
    @endsection