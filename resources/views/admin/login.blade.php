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
                        <label for="email" class="form-label">Е-мејл</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Пасворд</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>

                    <button type="submit" class="btn btn-warning text-black w-100">Логирај се</button>
                </form>
            </div>
        </div>
    </div>
@endsection
