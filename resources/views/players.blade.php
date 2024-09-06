@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    {{-- Displaying players --}}
                    <div class="card-header">{{ __('Players') }}</div>
                    <div class="card-body">

                        {{-- Button to add a new player --}}
                        <div class="d-flex justify-content-end border-bottom">
                            <a href="{{ route('player.create') }}" class="btn btn-primary text-white mb-3">
                                Add a new player
                            </a>
                        </div>

                        {{-- Player content  --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Team</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($players as $player)
                                    <tr>
                                        <td>{{ $player->name }} {{ $player->surname }}</td>
                                        <td>{{ $player->birthday }}</td>
                                        <td>{{ $player->team->name }}</td>
                                        <td>
                                            <a href="{{ route('player.edit', $player->id) }}">Edit</a>
                                            <form class="d-inline" action="{{ route('player.delete', $player->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn p-0 m-0 text-decoration-underline text-primary">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
