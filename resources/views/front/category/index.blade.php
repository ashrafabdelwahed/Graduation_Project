@extends('layouts.app')

@section('content')



<section class="experiences  py-5">
    <div class="title text-center mb-5">
        <h2 class=" text-primary mb-3">الاقسام </h2>
        <hr class="w-25 m-auto mb-2 text-primary">
    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <ul class="list-group">

                    @foreach ($categories as $category)


                    <li class="list-group-item">
                        <a href=" {{ route('category.show', $category->slug) }} " class="d-flex justify-content-between align-items-center nav-link px-0">
                            {{ $category->name }}
                            <span class="badge bg-primary rounded-pill"> {{ $category->posts->count() }} </span>
                        </a>
                    </li>

                    @endforeach

                </ul>
            </div>
        </div>


    </div>

    <nav aria-label="Page navigation" class="my-4 d-flex justify-content-center">
        {{$categories->links()}}
    </nav>


</section>



@endsection
