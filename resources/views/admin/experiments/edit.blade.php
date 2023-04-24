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
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header d-flex align-items-center ">
                    <h3 class="mb-0 mr-5 btn btn-dark">تعديل تجربة</h3>
                    @include('admin.layouts.message')

                </div>


                <div class="container-fluid mt-4">

                    <form action="{{ route('dashboard.experiments.update',$experiment->id) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title" class="col-form-label"> عنوان التجربة : </label>

                            <div>
                                <input id="title" type="text" class="form-control" name="title"
                                    value="{{ $experiment->title }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label> التجربة</label>
                            <textarea name="content" class="form-control ckeditor">
                                    {{ $experiment->content }}
                                </textarea>
                        </div>


                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" id="file" class="form-control form-control-file" name="image"
                                onchange="readURL(this);">
                        </div>

                        <div class="form-group">
                            <img width="250" height="250" src="{{ $experiment->image_path }}" id="image" class="mt-4">
                        </div>


                        <div class="form-group">
                            <label for="video">الفيديو</label>
                            <input type="file" id="file" class="form-control form-control-file" name="video">
                        </div>


                        <div class="form-group">

                            <video width="320" height="240" controls>
                                <source src="{{ $experiment->video_path }}" type="video/mp4">
                            </video>
                        </div>


                        <div class="form-group my-3">
                            <button type="submit" class="btn btn-success"> حفظ</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection


@section('js')

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(250)
                    .height(250);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endsection
