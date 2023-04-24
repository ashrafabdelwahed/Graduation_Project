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
                    <h3 class="mb-0 mr-5">المتطوعين</h3>
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
                                <th class="text-center">الاكشن</th>
                            </tr>
                        </tfoot> --}}

                        <tbody>

                            @foreach ($volunteers as $volunteer)


                            <tr>
                                <td> {{ $volunteer->id }} </td>
                                <td> {{ $volunteer->name }} </td>
                                <td> {{ $volunteer->email }} </td>
                                <td> {{ $volunteer->phone }} </td>
                                <td> {{ $volunteer->city->name }} </td>

                                <td class="text-center">
                                    <a href="{{ route('dashboard.volunteers.edit',$volunteer->id) }}"
                                        class="btn btn-success">تعديل</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-{{ $volunteer->id }}">
                                        حذف
                                    </button>


                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $volunteer->id }}" tabindex="-1" role="dialog"
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

                                            <h3> هل تريد حذف {{ $volunteer->name }} ؟</h3>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">لا</button>
                                            <form class="d-inline"
                                                action="{{ route('dashboard.volunteers.destroy',$volunteer->id) }}"
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
