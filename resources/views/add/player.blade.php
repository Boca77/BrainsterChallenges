@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create new Player') }}</div>
                    <div class="card-body">

                        {{-- Form to add a new player --}}
                        <form action="{{ route('player.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>

                            <div class="mb-3">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" class="form-control" name="surname" id="surname"
                                    placeholder="Surname">
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date of birth</label>
                                <input type="date" class="form-control" name="birthday" id="date">
                            </div>

                            <div class="mb-3">
                                <label for="team" class="form-label">Team</label>
                                <select name="team_id" class="form-select" id="team">
                                    <option disabled selected>Choose a team</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
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
