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
    <!-- Table -->


    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header d-flex align-items-center ">
                    <h3 class="mb-0 mr-5">الصفحة الشخصية</h3>
                    @include('admin.layouts.message')

                </div>

                <div class="card-body">

                    <form action="{{ route('dashboard.profile.update') }}" method="POST">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">المعلومات الشخصية</h6>
                        <div class="pl-lg-4">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">الاسم</label>
                                        <input type="text" name="name"  class="form-control" placeholder="الاسم"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">البريد الالكتروني</label>
                                        <input type="email" name="email" class="form-control" placeholder="الاسم"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="phone">رقم الموبايل</label>
                                        <input type="tel" name="phone" class="form-control" placeholder="الاسم"
                                            value="{{ $user->phone }}">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label for="city_id">المحافظة</label>
                                    <select class="js-example-basic-single form-control" name="city_id">
                                        @foreach ($cities as $city)
                                        <option <?php if ($user->city_id == $city->id) {
                                            echo "selected"; } ?> value="{{ $city->id }}"> {{ $city->name }} </option>
                                        @endforeach
                                    </select>
                                </div>


                                @if ($user->hasRole('doctors'))

                                <div class="col-md-12">
                                    <label for="specialization_id">التخصص</label>
                                    <select class="js-example-basic-single form-control" name="specialization_id">
                                        @foreach ($specializations as $specialization)
                                        <option <?php if ($user->specialization_id == $specialization->id) {
                                            echo "selected"; } ?> value="{{ $specialization->id }}">
                                            {{ $specialization->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif



                                <div class="col-md-12 mt-4">
                                    <a href=" {{ route('dashboard.profile.change_password') }}" class="btn btn-primary">
                                        <span>تغيير كلمة المرور</span>
                                    </a>
                                </div>



                            </div>

                        </div>
                        <hr class="my-4">
                        <div class="text-center">
                            <div class="form-group">
                                <button class="btn btn-dark">
                                    حفظ
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
