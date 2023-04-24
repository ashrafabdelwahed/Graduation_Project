@extends('layouts.app')

@section('content')

<section class="experiences  py-5">
    <div class="title text-center mb-5">
        <h2 class=" text-primary mb-3">نتائج البحث </h2>
        <hr class="w-25 m-auto mb-2 text-primary">
    </div>

    <div class="container">

        <div class="row">


            <div class="col-md-5">
                <h4>المقالات</h4>
                <ul class="list-group">

                    @forelse ($posts as $post)

                    <li class="list-group-item">
                        <a href="#" class="d-flex justify-content-between nav-link px-0">
                            <div>
                                <h5>
                                    {{ $post->title }}
                                </h5>
                                <p>
                                    {!! Str::limit(strip_tags($post->content), 100, '...') !!}
                                </p>
                            </div>
                            <img src="{{ $post->image_path }}" width="100" alt="">
                        </a>
                    </li>
                    @empty
                    <li class="list-group-item">
                        <p class="mb-0  text-center p-2">لا يوجد نتائج مطابقة</p>
                    </li>
                    @endforelse
                </ul>
            </div>


            <div class="col-md-4">
                <h4>التجارب</h4>

                <ul class="list-group">
                    @forelse ($experiments as $exp)

                    <li class="list-group-item">
                        <a href="#" class="d-flex justify-content-between nav-link px-0">
                            <div>
                                <h5>
                                    {{ $exp->title }}
                                </h5>
                                <div>

                                    {!! Str::limit(strip_tags($exp->content), 100, '...') !!}

                                </div>
                            </div>
                            <img src="{{ $exp->image_path }}" width="100" alt="">
                        </a>
                    </li>
                    @empty
                    <li class="list-group-item">
                        <p class="mb-0  text-center p-2">لا يوجد نتائج مطابقة</p>
                    </li>
                    @endforelse
                </ul>
            </div>


            <div class="col-md-3">
                <h4>التوعية</h4>

                <ul class="list-group">
                    @forelse ($cancers as $cancer)

                    <li class="list-group-item">
                        <a href="#" class="d-flex justify-content-between nav-link px-0">
                            <div>
                                <h5>
                                    {{ $cancer->name }}
                                </h5>
                                <div>

                                    {!! Str::limit(strip_tags($cancer->content), 100, '...') !!}

                                </div>
                            </div>
                            <img src="{{ $cancer->image_path }}" width="100" alt="">
                        </a>
                    </li>
                    @empty
                    <li class="list-group-item">
                        <p class="mb-0  text-center p-2">لا يوجد نتائج مطابقة</p>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>


    </div>
</section>


@endsection
