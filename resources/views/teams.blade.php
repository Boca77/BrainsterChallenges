@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    {{-- Displaying teams --}}
                    <div class="card-header">{{ __('Teams') }}</div>
                    <div class="card-body">

                        {{-- Button to add a new team --}}
                        <div class="d-flex justify-content-end border-bottom">
                            <a href="{{ route('team.create') }}" class="btn btn-primary text-white mb-3">
                                Add a new team
                            </a>
                        </div>

                        {{-- teams content  --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Year Founded</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->year_of_foundation }}</td>
                                        <td>
                                            <a href="{{ route('team.edit', $team->id) }}">Edit</a>
                                            <form class="d-inline" action="{{ route('team.delete', $team->id) }}"
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
