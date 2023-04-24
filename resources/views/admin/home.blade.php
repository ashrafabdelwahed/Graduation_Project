    @extends('admin.index')



    @section('content')



    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                </div>
                <!-- Card stats -->
                <div class="row">
                    @if (auth()->user()->hasPermission('read_users'))
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">المشرفين</h5>
                                        <span class="h2 font-weight-bold mb-0"> {{ $super_admin }} </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">

                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">الدكاترة</h5>
                                        <span class="h2 font-weight-bold mb-0"> {{ $doctors }} </span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="fas fa-user-md"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">المتطوعين</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $volunteers }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="fas fa-hands-helping"></i> </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">المرضى</h5>
                                        <span class="h2 font-weight-bold mb-0"> {{ $patients }} </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="fas fa-user-injured"></i> </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">الاقسام</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $categories }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="fas fa-align-justify"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">التجارب</h5>
                                        <span class="h2 font-weight-bold mb-0"> {{ $experiments }} </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="far fa-address-card"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">المقالات والابحاث</h5>
                                        <span class="h2 font-weight-bold mb-0"> {{ $posts }} </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="fab fa-wpexplorer"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">

                                </p>
                            </div>
                        </div>
                    </div>

                    {{--  static --}}

                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">قيمة التبرعات </h5>
                                        <span class="h2 font-weight-bold mb-0"> {{ $donations->sum('amount') }} جنية </span>
                                    </div>
                                    <div class="col-auto">
                                        <div
                                            class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="fas fa-people-carry"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">

                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- Page content -->
    <div class="container-fluid mt--6">
        {{-- <div class="row">
            <div class="col-xl-8">
                <div class="card bg-default">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                                <h5 class="h3 text-white mb-0">Sales value</h5>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart"
                                        data-target="#chart-sales-dark"
                                        data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}'
        data-prefix="$" data-suffix="k">
        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
            <span class="d-none d-md-block">Month</span>
            <span class="d-md-none">M</span>
        </a>
        </li>
        <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark"
            data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$"
            data-suffix="k">
            <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                <span class="d-none d-md-block">Week</span>
                <span class="d-md-none">W</span>
            </a>
        </li>
        </ul>
    </div>
    </div>
    </div>
    <div class="card-body">
        <!-- Chart -->
        <div class="chart">
            <!-- Chart wrapper -->
            <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
        </div>
    </div>
    </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                        <h5 class="h3 mb-0">Total orders</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Chart -->
                <div class="chart">
                    <canvas id="chart-bars" class="chart-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
    </div> --}}



    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">احدث التجارب</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('dashboard.experiments.index') }}" class="btn btn-sm btn-primary">عرض
                                الكل</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">عنوان التجربة</th>
                                <th scope="col">الكاتب</th>
                                <th scope="col">الصورة</th>
                                <th scope="col">عرض التجربة</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($experiments_latest as $experiment)
                            <tr>
                                <th scope="row">
                                    {{ $experiment->title }}
                                </th>
                                <td>
                                    {{ $experiment->user->name }}
                                </td>
                                <td>
                                    <img height="50px" width="50px" src="{{ $experiment->image_path }}" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-primary"
                                        href="{{ route('dashboard.experiments.show',$experiment->id) }}">عرض</a>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="12">
                                    <h3> لا يوجد تجارب حتي الان</h3>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">الاقسام</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('dashboard.categories.index') }}" class="btn btn-sm btn-primary">عرض
                                الكل</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">اسم القسم</th>
                                <th scope="col">عدد المقالات </th>
                                <th scope="col">المقالات المربتطة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories_latest as $category)
                            <tr>
                                <th scope="row">
                                    {{ $category->name }}
                                </th>
                                <td>
                                    {{ $category->posts->count() }}
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('dashboard.categories.show', $category->id) }}">عرض</a>
                                </td>
                            </tr>
                            @empty
                            <tr class="text-center">
                                <th colspan="12">لا يوجد اقسام حتي الان</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    @endsection
