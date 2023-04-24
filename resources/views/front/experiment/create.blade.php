@extends('layouts.app')

@section('content')

<section class="experiences  py-5">
    <div class="title text-center mb-5">
        <h2 class=" text-primary mb-3">اكتب تجربتك</h2>
        <hr class="w-25 m-auto mb-2 text-primary">

        <p>شكرا لانك بتشارك تجربتك وبتساعد ابطال تانية</p>
    </div>

    <div class="container">

        <form action="{{ route('experiment.store') }}" enctype="multipart/form-data" method="POST">

            @csrf

            <div class="form-group mb-3">
                <label for="title" class="col-form-label mb-2"> عنوان التجربة : </label>
                <div>
                    <input id="title" type="text" class="form-control" name="title" required>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="title" class="col-form-label mb-2"> التجربة : </label>
                <textarea name="content" class="form-control ckeditor" required>
                </textarea>
            </div>

            <div class="form-group mb-3">
                <label for="image" class="mb-2">صورة</label>
                <input type="file" id="file" class="form-control form-control-file" name="image"
                    onchange="readURL(this);" required="">
            </div>

            {{-- <div class="form-group mb-3">
                <img src="" id="image" class="mt-4">
            </div> --}}

            <div class="form-group mb-3">
                <label for="video" class="mb-2">فيديو (اختياري)</label>
                <p> تقدر توجه رسالة او تحكي ترجبتك في الفيديو</p>
                <input type="file" id="file" class="form-control form-control-file" name="video">
            </div>

            <div class="form-group my-3">
                <button type="submit" class="btn btn-success"> حفظ</button>
            </div>

        </form>

    </div>


</section>



@endsection

