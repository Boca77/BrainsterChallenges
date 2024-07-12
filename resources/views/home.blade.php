@extends('layout.main')

@section('content')
    <div class="container p-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                <div>
                    <div>
                        <h3 class="fw-bold">Lorem ipsum</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur deserunt
                            ratione dolore eaque, molestiae pariatur ullam.</p>
                    </div>
                    <small class="fst-italic text-muted">
                        Posted by <span class="fw-bold">John Doe</span>
                    </small>
                </div>

                <hr class="my-4">

                <div>
                    <div>
                        <h3 class="fw-bold">Lorem ipsum 2</h3>
                    </div>
                    <small class="fst-italic text-muted">
                        Posted by <span class="fw-bold">John Doe</span> in another boring news
                    </small>
                </div>

                <hr class="my-4">

                <div>
                    <div>
                        <h3 class="fw-bold">Lorem ipsum 3</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et aliquid aut, dolore
                            rerum eum est numquam error in, amet facilis laborum consectetur iure possimus animi quos iusto
                            fuga, quia officia ipsam! Aut corporis laborum accusamus, itaque labore ipsa esse soluta facere
                            mollitia!</p>
                    </div>
                    <small class="fst-italic text-muted">
                        Posted by <span class="fw-bold">John Doe</span>

                    </small>
                </div>

                <hr class="my-4">

                <div>
                    <div>
                        <h3 class="fw-bold">Lorem ipsum 4</h3>
                        <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                    </div>
                    <small class="fst-italic text-muted">
                        Posted by <span class="fw-bold">Missy Doe</span>
                    </small>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end mb-4"><a class="btn btn-info text-white rounded-0 "
                        href="/">Older posts -></a></div>
            </div>
        </div>
    </div>
@endsection
