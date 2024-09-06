@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create new team') }}</div>
                    <div class="card-body">

                        {{-- Form to edit a team --}}
                        <form action="{{ route('team.update', $team->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $team->name }}"
                                    id="name" placeholder="Name">
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Year Founded</label>
                                <input type="text" class="form-control" name="year_of_foundation"
                                    value="{{ $team->year_of_foundation }}" id="year" placeholder="Year Founded">
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
