@extends('admin.index')


@section('css')

<style>
    .select2-selection--single {
        min-height: 45px !important;
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
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header d-flex align-items-center ">
                    <h3 class="mb-0 mr-5 btn btn-dark">تعديل مقال / بحث</h3>
                    @include('admin.layouts.message')

                </div>


                <div class="container-fluid mt-4">

                    <form action="{{ route('dashboard.posts.update',$post->id) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title" class="col-form-label"> عنوان المقال : </label>

                            <div>
                                <input id="title" type="text" class="form-control" name="title"
                                    value="{{ $post->title }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label> المقال</label>
                            <textarea name="content" class="form-control ckeditor">
                                    {{ $post->content }}
                                </textarea>
                        </div>


                        <div class="form-group">
                            <label for="category_id">القسم</label>
                            <select class="js-example-basic-single form-control" name="category_id">
                                @foreach ($categories as $category)
                                <option  <?php if ($post->category_id == $category->id) {
                                    echo "selected"; } ?> value="{{ $category->id }}">
                                    {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" id="file" class="form-control form-control-file" name="image"
                                onchange="readURL(this);">
                        </div>

                        <div class="form-group">
                            <img width="250" height="250" src="{{ $post->image_path }}" id="image" class="mt-4">
                        </div>


                        <div class="form-group">
                            <label for="video">الفيديو</label>
                            <input type="file" id="file" class="form-control form-control-file" name="video">
                        </div>


                        <div class="form-group">

                            <video width="320" height="240" controls>
                                <source src="{{ $post->video_path }}" type="video/mp4">
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
