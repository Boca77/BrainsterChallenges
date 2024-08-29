@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">

                {{-- Form to edit a new disscusion --}}
                <form action="{{ route('update.post', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control bg-white" id="title" name="title"
                            value="{{ $post->title }}">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label> <br>
                        <input type="file" id="image" name="image" accept="image/*" />
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control bg-white" id="description" cols="30" rows="4">{{ $post->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category_id" id="category">
                            <option selected value="{{ $post->category_id }}">{{ $post->category->name }}</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <input type="text" hidden name="user_id" value="{{ $post->user_id }}">

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
