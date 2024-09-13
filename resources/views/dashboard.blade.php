@extends('layout.app')

@push('vite')
    @vite(['resources/js/display.js'])
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="card p-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="m-0">Dashboard</h4>
                    <a href="{{ route('create') }}" class="btn btn-primary">Add a Vehicle</a>
                </div>
                <div class="p-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Model</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Plate Number</th>
                                <th scope="col">Registration Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="display-vehicle">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
