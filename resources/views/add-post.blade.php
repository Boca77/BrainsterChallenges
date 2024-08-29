@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">

                {{-- Form to add a new disscusion --}}
                <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control bg-white" id="title" name="title">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label> <br>
                        <input type="file" id="image" name="image" accept="image/*" />
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control bg-white" id="description" cols="30" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category_id" id="category">
                            <option selected disabled>Choose</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                {{-- Form error display --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
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
@endsection
