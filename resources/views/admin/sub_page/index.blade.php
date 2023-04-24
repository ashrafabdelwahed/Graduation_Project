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
                    <h3 class="mb-0 mr-5">الصفحات الفرعية</h3>
                    @include('admin.layouts.message')

                </div>

                <div class="card-body">


                    <div class="card-deck">

                        <div class="card">
                            <img class="card-img-top" width="150px" height="180px" src="{{ asset('admin_design/img/sub_page/about.png') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">صفحة من نحن</h5>
                                <a class="btn btn-block btn-dark" href="">تعديل</a>
                            </div>
                        </div>

                        <div class="card">
                            <img class="card-img-top" width="150px" height="180px" src="{{ asset('admin_design/img/sub_page/c_with_us.png') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">صفحة تواصل معنا</h5>
                                <a class="btn btn-block btn-dark" href="">تعديل</a>
                            </div>
                        </div>

                        <div class="card">
                            <img class="card-img-top" src="{{ asset('admin_design/img/sub_page/about.png') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">صفحة من نحن</h5>
                                <a class="btn btn-block btn-dark" href="">تعديل</a>
                            </div>
                        </div>

                        <div class="card">
                            <img class="card-img-top" src="{{ asset('admin_design/img/sub_page/about.png') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">صفحة من نحن</h5>
                                <a class="btn btn-block btn-dark" href="">تعديل</a>
                            </div>
                        </div>


                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

@endsection
