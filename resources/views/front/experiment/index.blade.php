@extends('layouts.app')

@section('content')

<section class="experiences  py-5">


    @include('layouts.message')


    <div class="title text-center mb-5">
        <h2 class=" text-primary mb-3">التجارب الشخصية</h2>
        <hr class="w-25 m-auto mb-2 text-primary">

        <p> انت كمان تقدر تشارك تجربتك وتلهم ابطال تانية</p>
        <a class="btn btn-dark" href="{{ route('experiment.create') }}">شارك من هنا</a>
    </div>

    <div class="container">
        <div class="row">

            @foreach ($experiments as $experiment)
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                <div class="card">
                    <img src="{{ $experiment->image_path }}" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $experiment->title }}</h5>
                        <p class="card-text">
                            {!!  strip_tags(Str::limit($experiment->content, 145)) !!}
                        </p>
                        <a href="{{ route('experiment.show', $experiment->slug) }}" class="btn btn-primary">التجربة كاملة</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <nav aria-label="Page navigation" class="my-4 d-flex justify-content-center">
        {{$experiments->links()}}
    </nav>

</section>


@endsection
