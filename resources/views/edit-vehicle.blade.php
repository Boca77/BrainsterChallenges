@extends('layout.app')

@push('vite')
    @vite(['resources/js/edit.js'])
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row">
            <h1>Eddit a Vehicle</h1>
            <form id="Form">
                @csrf

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" name="model" value="{{ $vehicle->model }}">
                </div>

                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="{{ $vehicle->brand }}">
                </div>

                <div class="mb-3">
                    <label for="plate" class="form-label">Plate Number</label>
                    <input type="text" class="form-control" id="plate" name="plate_number"
                        value="{{ $vehicle->plate_number }}">
                </div>

                <div class="mb-3">
                    <label for="insurance" class="form-label">Insurance Date</label>
                    <input type="date" class="form-control" id="insurance" name="insurance_date"
                        value="{{ $vehicle->insurance_date }}">
                </div>

                <input type="text" hidden name="id" value="{{ $vehicle->id }}" id="">

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div id="error-message" class="mt-2"></div>
        </div>
    </div>
@endsection
