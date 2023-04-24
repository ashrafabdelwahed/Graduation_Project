@extends('layouts.app')

@section('content')




    <!-- start header  -->
    <header>
        <div id="carousel_header" class="carousel slide" data-bs-ride="carousel">


            <div class="carousel-inner">


                @foreach ($msgs as $key => $msg)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <img src="{{ $msg->image_path }}" class="d-block w-100" height="600px" alt="...">
                </div>
                @endforeach




                {{-- <div class="carousel-item ">
                    <img src=" {{ asset('front_end/img/2.jpg') }} " class="d-block w-100" height="565" alt="...">
                </div> --}}
            </div>


            <a class="carousel-control-prev" href="#carousel_header" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel_header" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </header>
    <!-- end header  -->

    <!-- start section about us  -->
    <section class="about mt-4">
        <div class="container">
            <div class="row     align-items-center">
                <div class="col-12 col-md-6">
                    <div class="mb-3 mb-md-0 text-center text-md-start">
                        <h3>
                            <span class="text-primary d-inline-block mb-3">
                                أهلاً بكم في
                            </span>
                            <br>
                            الجمعية المصرية لدعم مرضى السرطان
                            "انت تقدر"
                        </h3>

                        <p class="text-muted lead my-3">
                            <strong>
                                هدفنا جمع تجارب الناجين لدعم الابطال في مسيرتهم مع المرض
                                <br>
                                والتوعية بالمرض و الكشف المبكر

                            </strong>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center">
                    <img src="{{ asset('front_end/img/test.jpg') }}" class=" img-thumbnail img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- end about us -->

    <!-- التجارب -->
    <section class="experiences mt-5 py-4">
        <div class="title text-center">
            <h2 class=" text-primary mb-3">التجارب الشخصية</h2>
            <hr class="w-25 m-auto mb-5 text-primary">
        </div>

        <div class="container">
            <div class="row">
                @foreach ($experiments as $exp)
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card  mb-4 mb-lg-3">
                        <img src=" {{ $exp->image_path }} " height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $exp->title }}  </h5>
                            <p class="card-text">

                                {!! Str::limit( strip_tags($exp->content) , 100) !!}
                            </p>
                            <a href=" {{ route('experiment.show', $exp->slug) }} " class="btn btn-primary">التجربة كاملة</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="title text-center mt-3">
            <h4 class=" text-primary mb-3">
                <a class="btn btn-dark" href=" {{ route('experiments') }} ">عرض المزيد من التجارب</a>
            </h4>
            <hr class="w-25 m-auto text-primary">
        </div>
    </section>





@endsection
