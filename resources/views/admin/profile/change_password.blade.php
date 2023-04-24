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

                    <form action="{{ route('dashboard.profile.update_password') }}" method="POST">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">تغير كلمة المرور</h6>
                        <div class="pl-lg-4">
                            <div class="row">



                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="old_password">كلمة المرور الحالية</label>
                                        <input type="password" name="old_password" class="form-control"
                                            placeholder="كلمة المرور">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="password">كلمة المرور الجديدة</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="كلمة المرور">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="password_confirmation">تأكيد كلمة المرور الجديدة</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="كلمة المرور">
                                    </div>
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
