@extends('admin.auth_index')


@section('css')

<style>
    .select2-selection--single {
        min-height: 45px !important;
    }

</style>

@endsection



@php

use App\City;
use App\Specialization;

$cities = City::orderBy('id', 'ASC')->get();
$specializations = Specialization::orderBy('id', 'ASC')->get();

@endphp


<!-- Header -->
<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
            xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>
<!-- Page content -->
<div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary border-0">
                <div class="card-header bg-transparent text-center">
                    <strong>تسجيل حساب جديد</strong>
                </div>


                <div class="card-body px-lg-5 pb-lg-5 pt-lg-2">
                    <div class="text-center text-muted mb-4">
                    </div>
                    {{-- فورم الدكتور --}}
                    <div class="tab-pane fade show active" id="pills-doctors" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <form method="POST" action="{{ route('register') }}" class="basic-form">
                            @csrf

                            <div class="form-group r-name">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>

                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" placeholder="الاسم" required>
                                    @error('name')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="text-center alert alert-danger name_error d-none">الاسم يجب ان لا يحتوي
                                    علي ارقام او علامات</div>
                            </div>


                            <div class="form-group r-email">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror r-email" name="email"
                                        value="{{ old('email') }}" placeholder="البريد الالكتروني" required>

                                    @error('email')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="text-center alert alert-danger email_error d-none">البريد مكتوب بشكل غير
                                    صحيح</div>
                            </div>


                            <div class="form-group r-phone">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                    </div>
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" placeholder="رقم الموبايل" required autocomplete='false'>

                                    @error('phone')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="text-center alert alert-danger phone_error d-none">رقم الموبايل يجب ان
                                    لا يكون فارغ او يحتوي علي حروف</div>
                            </div>


                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <select
                                        class="js-example-basic-single form-control @error('city_id') is-invalid @enderror"
                                        name="city_id" value="{{ old('city_id') }}" required>
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"> {{ $city->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="كلمة المرور" required>

                                    @error('password')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="تأكيد كلمة المرور" required>
                                </div>
                            </div>


                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-6 pt-0">نوع الحساب :</legend>
                                    <div class="col-sm-12 ml-6">

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="type_of_account"
                                                id="volunteers" value="volunteers" checked>
                                            <label class="custom-control-label" for="volunteers">
                                                متطوع
                                            </label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="type_of_account"
                                                id="doctors" value="doctors">
                                            <label class="custom-control-label" for="doctors">
                                                دكتور
                                            </label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="type_of_account"
                                                id="patients" value="patients">
                                            <label class="custom-control-label" for="patients">
                                                مريض
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <div class="form-group d-none" id="specialization">
                                <label for="specialization_id">التخصص</label>
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <select disabled id="specialization_select"
                                        class="js-example-basic-single form-control @error('specialization_id') is-invalid @enderror"
                                        name="specialization_id" value="{{ old('specialization_id') }}" required>
                                        @foreach ($specializations as $specialization)
                                        <option value="{{ $specialization->id }}"> {{ $specialization->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('specialization_id')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary"> انشاء حساب </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('login') }}" class="text-light"><small>تسجيل الدخول بدلاً من ذلك.</small></a>
                </div>
            </div>
        </div>
    </div>
</div>
