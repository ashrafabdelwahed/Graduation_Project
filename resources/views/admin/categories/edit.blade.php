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
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header d-flex align-items-center ">
                    <h3 class="mb-0 mr-5 btn btn-dark"> تعديل القسم</h3>
                    @include('admin.layouts.message')

                </div>


                <div class="container-fluid mt-4">

                    <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST">

                        @csrf
                        @method('put')

                        <div class="form-row ">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label for="name">اسم القسم</label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}">
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
