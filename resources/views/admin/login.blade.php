@extends('layout.main')

@section('title', 'Admin Login')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center mb-5">Log In</h1>
            <div class="col-6 offset-3">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    @if (!$errors->isEmpty())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="email" class="form-label">Е-мејл</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ old('email') }}">

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
