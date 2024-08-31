@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="{{ route('update.comment', $comment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label for="comment" class="form-label">Comment</label>
                    <textarea name="content" id="comment" class="form-control bg-white" cols="30" rows="3">{{ $comment->content }}</textarea>
                    <input type="text" name="user_id" value="{{ $comment->user_id }}" hidden>
                    <input type="text" name="post_id" value="{{ $comment->post_id }}" hidden>
                    <button class="btn btn-primary my-3">Submit</button>
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
