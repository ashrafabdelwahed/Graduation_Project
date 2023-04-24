@extends('layouts.app')

@section('content')


<section class="cancer_single  py-5">
    <div class="title text-center">
        <h2 class=" text-primary mb-3"> {{ $cancer->name }} </h2>
        <hr class="w-25 m-auto mb-3 text-primary">

        <div class="w-75 m-auto mb-5">
            {!! $cancer->content !!}
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-8 ">
                <div class="text-center">
                    <img class=" img-fluid" src="{{ $cancer->image_path }}" alt="">
                </div>


                <div class="my-5">
                    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item bg-white m-2" role="presentation">
                            <a class="nav-link active" id="pills-risk_factors-tab" data-bs-toggle="pill"
                                href="#pills-risk_factors" role="tab" aria-controls="pills-risk_factors"
                                aria-selected="true">عوامل الخطورة
                            </a>
                        </li>
                        <li class="nav-item bg-white m-2" role="presentation">
                            <a class="nav-link" id="pills-early_symptoms-tab" data-bs-toggle="pill"
                                href="#pills-early_symptoms" role="tab" aria-controls="pills-early_symptoms"
                                aria-selected="false">العلامات والاعراض
                                المبكرة</a>
                        </li>
                        <li class="nav-item bg-white m-2" role="presentation">
                            <a class="nav-link" id="pills-protection-tab" data-bs-toggle="pill" href="#pills-protection"
                                role="tab" aria-controls="pills-protection" aria-selected="false">الوقاية</a>
                        </li>
                        <li class="nav-item bg-white m-2" role="presentation">
                            <a class="nav-link" id="pills-early_detection-tab" data-bs-toggle="pill"
                                href="#pills-early_detection" role="tab" aria-controls="pills-early_detection"
                                aria-selected="false">الكشف المبكر</a>
                        </li>



                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active bg-white shadow  rounded-3 p-4"
                            style="line-height: 2; font-size:22px" id="pills-risk_factors" role="tabpanel"
                            aria-labelledby="pills-risk_factors-tab">
                            {!! $cancer->risk_factors !!}
                        </div>
                        <div class="tab-pane fade bg-white shadow rounded  p-4" style="line-height: 2; font-size:22px"
                            id="pills-early_symptoms" role="tabpanel" aria-labelledby="pills-early_symptoms-tab">
                            {!! $cancer->early_symptoms !!}
                        </div>
                        <div class="tab-pane fade bg-white shadow  rounded p-4" style="line-height: 2; font-size:22px"
                            id="pills-protection" role="tabpanel" aria-labelledby="pills-protection-tab">
                            {!! $cancer->protection !!}
                        </div>

                        <div class="tab-pane fade bg-white shadow rounded  p-4" style="line-height: 2; font-size:22px"
                            id="pills-early_detection" role="tabpanel" aria-labelledby="pills-early_detection-tab">
                            {!! $cancer->early_detection !!}
                        </div>
                    </div>
                </div>

                @if ($cancer->video)
                <div class="text-center">
                    <video class="video img-fluid" src="{{ $cancer->video_path }}" controls></video>
                </div>
                @endif
            </div>




            {{-- Slide bar --}}
            <div class="col-md-4">

                <div class="bg-white p-2">


                    <div class="title text-center">
                        <h5 class="mb-3">اعرف اكتر عن باقي الامراض</h5>
                        <hr class="w-50 m-auto mb-4 text-primary">
                    </div>


                    @foreach ($cancers as $item)


                    <div class="card mb-3">
                        <img src="{{ $item->image_path }}" height="200px" class="card-img-top" alt="...">
                        <div class="card-body mb-0 pb-0">
                            <h5 class="card-title">
                                <a class="btn btn-sm btn-dark" href=" {{ route('cancer.show', $item->slug) }} ">
                                    {{ $item->name }}
                                </a>
                            </h5>
                            <div class="card-text">
                                {!! $item->content !!}
                            </div>
                        </div>
                    </div>


                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>


@endsection
