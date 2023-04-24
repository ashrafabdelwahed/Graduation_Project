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
                    <h3 class="mb-0 mr-5">التجارب</h3>

                    <a href=" {{ route('dashboard.experiments.create') }} " class="btn btn-primary"> اضافة تجربة جديدة
                    </a>


                    @include('admin.layouts.message')

                </div>


                <div class="table-responsive py-4">
                    <table class="table table-flush table-hover" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>الكود</th>
                                <th>عنوان التجربة</th>
                                <th>الصورة</th>
                                <th>كتب بواسطة</th>
                                <th>حالة التجربة</th>
                                <th class="text-center">الاكشن</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($experiments as $experiment)


                            <tr>
                                <td> {{ $experiment->id }} </td>
                                <td> {{ $experiment->title }} </td>
                                <td>
                                    <img height="80" width="80" src="{{ $experiment->image_path }}" alt="">
                                </td>
                                <td> {{ $experiment->user->name }} </td>
                                <td>

                                    @if ($experiment->status == 1)
                                    <span class="badge badge-pill badge-success badge-lg">منشورة</span>
                                    @else
                                    <span class="badge badge-pill badge-default badge-lg">بأنتظار الموافقة</span>
                                    @endif

                                </td>

                                <td class="text-center">

                                    <a href="{{ route('dashboard.experiments.show',$experiment->id) }}"
                                        class="btn btn-default">عرض</a>

                                    @if (auth()->user()->hasPermission('update_experiments'))

                                    <a href="{{ route('dashboard.experiments.edit',$experiment->id) }}"
                                        class="btn btn-success">تعديل</a>
                                    @else
                                    <button disabled="disabled" class="btn btn-success"
                                        title="ليس لديك صلاحيات لهذا العنصر">تعديل</button>
                                    @endif

                                    @if (auth()->user()->hasPermission('delete_experiments'))
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-{{ $experiment->id }}">
                                        حذف
                                    </button>
                                    @else
                                    <button disabled class="btn btn-danger" title="ليس لديك صلاحيات لهذا العنصر">
                                        حذف
                                    </button>

                                    @endif
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $experiment->id }}" tabindex="-1" role="dialog"
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

                                            <h3> هل تريد حذف {{ $experiment->title }} ؟</h3>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">لا</button>
                                            <form class="d-inline"
                                                action="{{ route('dashboard.experiments.destroy',$experiment->id) }}"
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
