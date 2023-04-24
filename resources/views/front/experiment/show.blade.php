@extends('layouts.app')

@section('content')


<section class="experiences_single  py-5">
    <div class="title text-center">
        <h2 class=" text-primary mb-3">{{ $experiment->title }}</h2>
        <hr class="w-25 m-auto mb-5 text-primary">
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="text-center">
                    <img class="img-fluid" src="{{ $experiment->image_path }}" alt="">
                </div>

                <div class="exp-text px-4 mt-3 text-bold">
                    {!! $experiment->content !!}
                </div>

                @if ($experiment->video)
                <div class="text-center">
                    <video class="video img-fluid" src="{{ $experiment->video_path }}" controls></video>
                </div>
                @endif
            </div>

            <div class="col-md-4">
                <div class="bg-white p-2">
                    <div class="title text-center">
                        <h4 class="mb-3">تجارب اخري مقترحة</h4>
                        <hr class="w-50 m-auto mb-4 text-primary">
                    </div>


                    @foreach ($experiments as $item)


                    <div class="card mb-3">
                        <img src="{{ $item->image_path }}" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href=" {{ route('experiment.show', $item->slug) }} ">
                                    {{ $item->title }}
                                </a>
                            </h5>
                            <p class="card-text">
                                {!! Str::limit($item->content, 140, '...') !!}
                            </p>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
