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
                    <h3 class="mb-0 mr-5">الدكاترة</h3>
                    {{-- <a href="" class="btn btn-primary"> اضافة حساب </a> --}}

                    @include('admin.layouts.message')

                </div>


                <div class="table-responsive py-4">
                    <table class="table table-flush table-hover" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>الكود</th>
                                <th>الاسم</th>
                                <th>البريد الالكتروني </th>
                                <th> رقم الموبايل </th>
                                <th> المحافظة</th>
                                <th>التخصص</th>

                                <th class="text-center">الاكشن</th>
                            </tr>
                        </thead>

                        {{-- <tfoot>
                            <tr>
                                <th>الكود</th>
                                <th>الاسم</th>
                                <th>البريد الالكتروني </th>
                                <th> رقم الموبايل </th>
                                <th> المحافظة</th>
                                <th>التخصص</th>
                                <th class="text-center">الاكشن</th>
                            </tr>
                        </tfoot> --}}

                        <tbody>

                            @foreach ($doctors as $doctor)


                            <tr>
                                <td> {{ $doctor->id }} </td>
                                <td> {{ $doctor->name }} </td>
                                <td> {{ $doctor->email }} </td>
                                <td> {{ $doctor->phone }} </td>
                                <td> {{ $doctor->city->name }} </td>
                                <td> {{ $doctor->specialization->title }} </td>

                                <td class="text-center">
                                    <a href="{{ route('dashboard.doctors.edit',$doctor->id) }}"
                                        class="btn btn-success">تعديل</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-{{ $doctor->id }}">
                                        حذف
                                    </button>


                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $doctor->id }}" tabindex="-1" role="dialog"
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

                                            <h3> هل تريد حذف {{ $doctor->name }} ؟</h3>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">لا</button>
                                            <form class="d-inline"
                                                action="{{ route('dashboard.doctors.destroy',$doctor->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger text-white">نعم</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
