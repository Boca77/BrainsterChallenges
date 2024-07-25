@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center mb-5">Log In</h1>
            <div class="col-6 offset-3">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
