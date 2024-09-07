@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    {{-- Displaying matches --}}
                    <div class="card-header">{{ __('Matches') }}</div>
                    <div class="card-body">

                        {{-- Button to add a new match only for admin --}}
                        @if (auth()->user()->is_admin)
                            <div class="d-flex justify-content-end border-bottom">
                                <a href="{{ route('match.create') }}" class="btn btn-primary text-white mb-3">
                                    Add a new match
                                </a>
                            </div>
                        @endif

                        {{-- Match content  --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Team 1</th>
                                    <th scope="col">Team 2</th>
                                    <th scope="col">Resault</th>
                                    <th scope="col"></th>
                                    @if (auth()->user()->is_admin)
                                        <th></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($games as $game)
                                    <tr>
                                        <td>{{ $game->home->name }}</td>
                                        <td>{{ $game->away->name }}</td>
                                        <td>
                                            @if ($game->score)
                                                {{ $game->score }}
                                            @else
                                                /
                                            @endif
                                        </td>
                                        <td><a href="{{ route('match.show', $game->id) }}">See players</a></td>

                                        @if (auth()->user()->is_admin)
                                            <td>
                                                <a href="{{ route('match.edit', $game->id) }}">Edit</a>
                                                <form class="d-inline" action="{{ route('match.delete', $game->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn p-0 m-0 text-decoration-underline text-primary">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        @endif

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{-- Display error message --}}
                        @if (session('error'))
                            <div class="container">
                                <div class="row">
                                    <p class="alert alert-danger"> {{ session('error') }}</p>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
