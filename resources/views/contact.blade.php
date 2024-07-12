@extends('layout.main')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-6 offset-3">
                <form>
                    <div class="form-floating">
                        <input class="form-control border-0 border-bottom rounded-0 my-2" id="name" type="text">
                        <label class="text-muted" for="name">Name</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control border-0 border-bottom rounded-0 my-2" id="email" type="email">
                        <label class="text-muted" for="email">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input class="form-control border-0 border-bottom rounded-0 my-2" id="phone" type="tel">
                        <label class="text-muted" for="phone">Phone Number</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control border-0 border-bottom rounded-0 my-2" id="message" style="height: 12rem"></textarea>
                        <label class="text-muted" for="message">Message</label>

                    </div>
                    <button class="btn btn-info text-white rounded-0 text-uppercase mt-2" type="submit">Send</button>
                </form>
            </div>
        </div>

    </div>
@endsection
