@extends('layouts.app')

@section('content')


<section class="experiences  py-5">
    <div class="title text-center mb-5">
        <h2 class=" text-primary mb-3"> المقالات الخاصة بقسم {{ $category->name }} </h2>
        <hr class="w-25 m-auto mb-2 text-primary">

        <p>لو انت دكتور تقدر تسجل حساب وتكتب مقالات وتفيد المجتمع </p>
        <a class="btn btn-dark" href="{{ route('register') }}">سجل من هنا</a>
    </div>

    <div class="container">
        <div class="row">

            @foreach ($posts as $post)
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                <div class="card">
                    <img src="{{ $post->image_path }}" height="200px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <div class="card-text">
                            {!! strip_tags(Str::limit($post->content, 150)) !!}
                        </div>
                        <a href=" {{ route('post.show', $post->slug) }} " class="btn btn-primary mt-4 mb-2">عرض المزيد</a>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>

    <nav aria-label="Page navigation" class="my-4 d-flex justify-content-center">
        {{$posts->links()}}
    </nav>

</section>





@endsection
