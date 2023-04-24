@extends('admin.index')



@section('content')


<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mt--6">
    <!-- Table -->


    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header d-flex align-items-center ">
                    <h3 class="mb-0 h1 mr-5">{{ $post->title }}</h3>
                    @include('admin.layouts.message')
                </div>


                <div class="card-body mt-2">
                    <!-- Card image -->

                    <div class="text-center">
                        <img class="card-img mb-2" style="width: 400px !important" src="{{ $post->image_path }}"
                            alt="Image placeholder">
                        <br>
                        <small class="text-muted">بواسطة {{ $post->user->name }}
                            {{ $post->created_at->diffForHumans() }} </small>

                    </div>


                    @if ($post->video != null )
                    <div class="container text-center mt-3">
                        <video class="col"  controls>
                            <source src="{{ $post->video_path }}" type="video/mp4">
                            <source src="{{ $post->video_path }}" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @endif



                    <!-- Card body -->
                    <div class="card-body">
                        <p class="card-text mt-4">{!! $post->content !!}</p>
                    </div>




                </div>


            </div>
        </div>
    </div>
</div>

@endsection
