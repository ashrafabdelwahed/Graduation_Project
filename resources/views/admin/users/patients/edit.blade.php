@extends('admin.index')

@section('css')

<style>
    .select2-selection--single {
        min-height: 45px  !important;
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
                    <h3 class="mb-0 mr-5 btn btn-dark"> تعديل المريض/ة</h3>
                    {{-- <a href="" class="btn btn-primary"> اضافة حساب </a> --}}
                    @include('admin.layouts.message')

                </div>


                <div class="container-fluid mt-4">

                    <form action="{{ route('dashboard.patients.update', $user->id) }}" method="POST">

                        @csrf
                        @method('put')

                        <div class="form-row ">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="name">الاسم</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="email">البريد الالكتروني</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                        </div>


                        <div class="form-row my-3">
                            <div class="col-md-6">
                                <label for="phone">رقم الموبايل</label>
                                <input type="tel" name="phone" class="form-control" value="{{ $user->phone }}">
                            </div>

                            <div class="col-md-6   my-3 my-md-0">
                                <label for="city_id">المحافظة</label>
                                <select class="js-example-basic-single form-control" name="city_id">
                                    @foreach ($cities as $city)
                                    <option   <?php if ($user->city_id == $city->id) {
                                        echo "selected"; } ?>   value="{{ $city->id }}"> {{ $city->name }} </option>
                                    @endforeach
                                </select>

                            </div>



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
