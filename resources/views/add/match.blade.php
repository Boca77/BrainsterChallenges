@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create new Team') }}</div>
                    <div class="card-body">
                        
                        {{-- Form to add a new match --}}
                        <form action="{{ route('match.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="home" class="form-label">Home Team</label>
                                <select name="home_id" class="form-select" id="home">
                                    <option disabled selected>Choose a team</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="away" class="form-label">Away Team</label>
                                <select name="away_id" class="form-select" id="away">
                                    <option disabled selected>Choose a team</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" name="played_at" id="date">
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>

                        {{-- Display error message --}}
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
