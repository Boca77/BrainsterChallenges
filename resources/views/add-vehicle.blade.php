@extends('layout.app')

@push('vite')
    @vite(['resources/js/create.js'])
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row">
            <h1>Add a new Vehicle</h1>
            <form id="Form">
                @csrf

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" name="model">
                </div>

                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control" id="brand" name="brand">
                </div>

                <div class="mb-3">
                    <label for="plate" class="form-label">Plate Number</label>
                    <input type="text" class="form-control" id="plate" name="plate_number">
                </div>

                <div class="mb-3">
                    <label for="insurance" class="form-label">Insurance Date</label>
                    <input type="date" class="form-control" id="insurance" name="insurance_date">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div id="error-message" class="mt-2"></div>
        </div>
    </div>
@endsection
