@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    {{-- Displaying match --}}
                    <div class="card-header">{{ __('Game played at ' . $game->played_at . ' with a score ' . $game->score) }}
                    </div>
                    <div class="card-body">

                        {{-- Match content  --}}
                        <div class="d-flex">
                            <div class="w-50">
                                <h3>{{ $home->name }}</h3>
                                <ul>
                                    @forelse ($home->players as $player)
                                        <li>{{ $player->name }} {{ $player->surname }}</li>
                                    @empty
                                        <li>no player data for this team</li>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="w-50">
                                <h3>{{ $away->name }}</h3>
                                <ul>
                                    @forelse ($away->players as $player)
                                        <li>{{ $player->name }} {{ $player->surname }}</li>
                                    @empty
                                        <li>no player data for this team</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
