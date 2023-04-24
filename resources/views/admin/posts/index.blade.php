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
                    <h3 class="mb-0 mr-5">المقالات والابحاث</h3>

                    <a href=" {{ route('dashboard.posts.create') }} " class="btn btn-primary"> اضافة مقال / بحث جديد
                    </a>


                    @include('admin.layouts.message')

                </div>


                <div class="table-responsive py-4">
                    <table class="table table-flush table-hover" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>الكود</th>
                                <th>عنوان المقال</th>
                                <th>الصورة</th>
                                <th>كتب بواسطة</th>
                                <th>القسم</th>
                                <th class="text-center">الاكشن</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($posts as $post)


                            <tr>
                                <td> {{ $post->id }} </td>
                                <td> {{ $post->title }} </td>
                                <td>
                                    <img height="80" width="80" src="{{ $post->image_path }}" alt="">
                                </td>
                                <td> {{ $post->user->name }} </td>
                                <td>
                                    {{ $post->category->name }}
                                </td>

                                <td class="text-center">

                                    <a href="{{ route('dashboard.posts.show',$post->id) }}"
                                        class="btn btn-default">عرض</a>

                                    <a href="{{ route('dashboard.posts.edit',$post->id) }}"
                                        class="btn btn-success">تعديل</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-{{ $post->id }}">
                                        حذف
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $post->id }}" tabindex="-1" role="dialog"
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

                                            <h3> هل تريد حذف {{ $post->title }} ؟</h3>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">لا</button>
                                            <form class="d-inline"
                                                action="{{ route('dashboard.posts.destroy',$post->id) }}"
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
