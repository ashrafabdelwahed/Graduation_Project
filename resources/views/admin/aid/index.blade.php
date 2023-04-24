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
                    <h3 class="mb-0 mr-5">المساعدات والتبرعات</h3>

                    {{-- <a href=" {{ route('dashboard.aid.money') }} " class="btn btn-primary">
                    اتبرع أون لاين
                    </a> --}}
                    @include('admin.layouts.message')

                </div>


                <div class="card-body py-4">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="text-center my-3">
                                قيمة التبرعات اونلاين حتي الان
                                <strong>
                                    {{ $donations->sum('amount') }}
                                </strong>
                                جنية مصري
                            </h2>
                        </div>

                        <div class="col-12">
                            <div class="justify-content-center d-flex">
                                <a href="{{ route('dashboard.aid.money') }}" class="btn btn-success btn-lg">
                                    اتبرع اونلاين
                                    <i class="fas fa-credit-card ml-1"></i>
                                </a>


                                <a href="!#" class="btn btn-dark btn-lg">
                                    إرسال مندوب
                                    <i class="fas fa-people-carry ml-1"></i>
                                    (soon)
                                </a>
                            </div>
                        </div>
                    </div>



                </div>

                @if (auth()->user()->hasRole('super_admin'))

                <hr>

                <div class="table-responsive py-4">
                    <table class="table table-flush table-hover" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>الكود</th>
                                <th>اسم المتبرع</th>
                                <th>الموبايل</th>
                                <th>البريد الاكتروني</th>
                                <th>قيمة التبرع </th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($donations as $don)


                            <tr>
                                <td> {{ $don->id }} </td>
                                <td> {{ $don->donor }} </td>
                                <td> {{ $don->phone }} </td>
                                <td> {{ $don->email }} </td>
                                <td> {{ $don->amount }} جنية مصري </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

                @endif



            </div>
        </div>
    </div>
</div>

@endsection

{{-- if($user->hasRole('doctors')) --}}
