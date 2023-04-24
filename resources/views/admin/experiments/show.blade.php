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
                    <h3 class="mb-0 h1 mr-5">{{ $experiment->title }}</h3>
                    @include('admin.layouts.message')
                </div>


                <div class="card-body mt-2">
                    <!-- Card image -->

                    <div class="text-center">
                        <img class="card-img mb-2" style="width: 400px !important" src="{{ $experiment->image_path }}"
                            alt="Image placeholder">
                        <br>
                        <small class="text-muted">بواسطة {{ $experiment->user->name }}
                            {{ $experiment->created_at->diffForHumans() }} </small>

                    </div>


                    @if ($experiment->video != null )
                    <div class="container text-center mt-3">
                        <video class="col"  controls>
                            <source src="{{ $experiment->video_path }}" type="video/mp4">
                            <source src="{{ $experiment->video_path }}" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @endif



                    <!-- Card body -->
                    <div class="card-body">
                        <p class="card-text mt-4">{!! $experiment->content !!}</p>
                    </div>





                    @if ($experiment->status == 0 && auth()->user()->hasRole('super_admin'))
                    <div class="text-center my-3">

                        <form class=" d-inline" action="{{ route('dashboard.experiments.share', $experiment->id) }}"
                            method="post">
                            @csrf
                            <button class="btn btn-default" type="submit"> نشر التجربة </button>
                        </form>

                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#modal-{{ $experiment->id }}">
                            حذف التجربة
                        </button>
                        <div class="modal fade" id="modal-{{ $experiment->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">تأكيد الحذف</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <h3> هل تريد حذف {{ $experiment->title }} ؟</h3>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
                                        <form class="d-inline"
                                            action="{{ route('dashboard.experiments.destroy',$experiment->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger text-white">نعم</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else

                    @endif


                </div>


            </div>
        </div>
    </div>
</div>

@endsection
