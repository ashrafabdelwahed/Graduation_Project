@extends('layouts.app')

@section('content')

<section class="experiences_single  py-5">
    <div class="title text-center">
        <h2 class=" text-primary mb-3"> {{ $post->title }} </h2>
        <hr class="w-25 m-auto mb-5 text-primary">
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="text-center">
                    <img class=" img-fluid mb-2" src="{{ $post->image_path }}" alt="">
                    <small class="text-muted d-block">كتب {{ $post->user->name }}
                        {{ $post->created_at->diffForHumans() }} </small>
                </div>

                <div class="exp-text px-4 mt-3 text-bold">

                    {!! $post->content !!}

                </div>

                @if ($post->video)


                <div class="text-center">
                    <video class="video img-fluid" src="{{ $post->video_path }}" controls></video>
                </div>

                @endif

            </div>

            <div class="col-md-4">

                <div class="bg-white p-2">


                <div class="title text-center">
                    <h4 class="mb-3"> مقالات مقترحة</h4>
                    <hr class="w-50 m-auto mb-4 text-primary">
                </div>


                @foreach ($posts_related as $item)
                <div class="card mb-3">
                    <img src="{{ $item->image_path }}" height="200px" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href=" {{ route('post.show', $item->slug) }} ">
                               {{$item->title}}
                            </a>
                        </h5>
                        <p class="card-text">
                            {!! Str::limit($post->content, 140) !!}
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
