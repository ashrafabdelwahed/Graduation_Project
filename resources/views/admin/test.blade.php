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

$cities = City::all();
$specializations = Specialization::all();

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
                <div class="card-header bg-transparent">
                    @include('admin.layouts.message')


                    <form action="{{ route('dashboard.test') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>

                                <input id="video" type="file"
                                    class="form-control @error('video') is-invalid @enderror" name="video"
                                    value="{{ old('video') }}" placeholder="الاسم" required>
                                    @error('video')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>

                            <div class="form-group">
                                <button type="submit">Send</button>
                            </div>

                    </form>



            </div>
        </div>
    </div>
</div>
