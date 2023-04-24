@extends('admin.index')

@section('css')
<style>
    .content ul li,
    .content ol li {
        font-size: 3vh;
        font-weight: 900;
        line-height: 2;
    }

    .content p {
        font-size: 26px;
        font-weight: bold
    }

</style>
@endsection


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
                    <h3 class="mb-0 h1 mr-5">{{ $cancer->name }}</h3>
                    @include('admin.layouts.message')
                </div>


                <div class="card-body mt-2">
                    <!-- Card image -->

                    <div class="content text-center my-4 w-75 m-auto h1" style="font-size: 20px">
                            {!! $cancer->content !!}
                    </div>



                    <div class="text-center">
                        <img class="card-img mb-2" style="width: 400px !important" src="{{ $cancer->image_path }}"
                            alt="Image placeholder">
                    </div>



                    @if ($cancer->video != null )
                    <div class="container text-center mt-3">
                        <video class="col" controls>
                            <source src="{{ $cancer->video_path }}" type="video/mp4">
                            <source src="{{ $cancer->video_path }}" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @endif



                    <!-- Card body -->
                    <div class="card-body">

                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="risk_factors-tab" data-toggle="tab"
                                        href="#risk_factors" role="tab" aria-controls="risk_factors"
                                        aria-selected="true">عوامل الخطورة</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="early_symptoms-tab" data-toggle="tab"
                                        href="#early_symptoms" role="tab" aria-controls="early_symptoms"
                                        aria-selected="false">العلامات والاعراض
                                        المبكرة</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="protection-tab" data-toggle="tab"
                                        href="#protection" role="tab" aria-controls="protection"
                                        aria-selected="false">الوقاية</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="early_detection-tab" data-toggle="tab"
                                        href="#early_detection" role="tab" aria-controls="early_detection"
                                        aria-selected="false">الكشف المبكر</a>
                                </li>

                            </ul>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="risk_factors" role="tabpanel"
                                        aria-labelledby="risk_factors-tab">
                                        <div class="content">
                                            {!! $cancer->risk_factors !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="early_symptoms" role="tabpanel"
                                        aria-labelledby="early_symptoms-tab">
                                        <div class="content">
                                            {!! $cancer->early_symptoms !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="protection" role="tabpanel"
                                        aria-labelledby="protection-tab">
                                        <div class="content">
                                            {!! $cancer->protection !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="early_detection" role="tabpanel"
                                        aria-labelledby="early_detection-tab">
                                        <div class="content">
                                            {!! $cancer->early_detection !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>





                </div>


            </div>
        </div>
    </div>
</div>

@endsection
