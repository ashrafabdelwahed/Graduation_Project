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
                    <h3 class="mb-0 h1 mr-5">رسالة أمل</h3>
                    @include('admin.layouts.message')
                </div>


                <div class="card-body mt-2">
                    <!-- Card image -->

                    <div class="text-center">
                        <img class="card-img mb-2" style="width: 400px !important" src="{{ $msg->image_path }}"
                            alt="Image placeholder">
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>

@endsection
