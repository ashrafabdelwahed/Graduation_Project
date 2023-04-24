<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                انت
                <span class=" text-primary" style="font-weight: bold;">
                    تقدر
                    <i class="fas fa-heart"></i>
                    <!-- <i class="fas fa-hand-scissors"  style="transform: rotate(40deg);"></i> -->
                </span>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">




                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#navbar-dashboard" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-courses">
                            <i class="ni ni-tv-2 text-primary" style="color: #f4645f;"></i>
                            <span class="nav-link-text"> لوحة التحكم </span>
                        </a>

                        <div class="collapse" id="navbar-dashboard">

                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard.home') }}">
                                        <i class="ni ni-tv-2 text-red"></i>
                                        <span class="nav-link-text font-weight-bold"> الصفحة الرئيسية </span>
                                    </a>
                                </li>

                                {{-- <li class="nav-item">
                                    <a class="nav-link" href=" {{ route('dashboard.sub_page') }} ">
                                <i class="fas fa-file text-red"></i>
                                <span class="nav-link-text font-weight-bold"> الصفحات الفرعية </span>
                                </a>
                    </li> --}}

                </ul>
            </div>
            </li>


            @if (auth()->user()->hasRole('super_admin'))
                <li class="nav-item">
                    <a class="nav-link" href=" {{ route('dashboard.msg.index') }} ">
                        <i class="fas fa-envelope-open" style="color: #f4645f;"></i>
                        <span class="nav-link-text">رسائل الأمل</span>
                    </a>
                </li>
            @endif


            {{-- @if (auth()->user()->hasPermission('read_users'))

            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-users text-red" style="color: #f4645f;"></i>
                    <span class="nav-link-text">المشرفين</span>
                </a>
            </li>
            @endif --}}

            @if (auth()->user()->hasPermission('read_users'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.doctors.index') }}">
                    <i class=" fas fa-user-md" style="color: #f4645f;"></i>
                    <span class="nav-link-text">الدكاترة</span>
                </a>
            </li>
            @endif


            @if (auth()->user()->hasPermission('read_users'))
            <li class="nav-item">
                <a class="nav-link" href=" {{ route('dashboard.volunteers.index') }} ">
                    <i class=" fas fa-hands-helping text-green" style="color: #f4645f;"></i>
                    <span class="nav-link-text">المتطوعين</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->hasPermission('read_users'))
            <li class="nav-item">
                <a class="nav-link" href=" {{ route('dashboard.patients.index') }} ">
                    <i class=" fas fa-user-injured text-info" style="color: #f4645f;"></i>
                    <span class="nav-link-text">المرضى</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->hasPermission('read_categories'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.categories.index') }}">
                    <i class="fas fa-align-justify" style="color: #f4645f;"></i>
                    <span class="nav-link-text">الاقسام</span>
                </a>
            </li>
            @endif


            @if (auth()->user()->hasPermission('read_posts'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.posts.index') }}">
                    <i class="fab fa-wpexplorer text-blue" style="color: #f4645f;"></i>
                    <span class="nav-link-text">المقالات والابحاث</span>
                </a>
            </li>
            @endif


            @if (auth()->user()->hasPermission('read_experiments'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.experiments.index') }}">
                    <i class="far fa-address-card text-blue" style="color: #f4645f;"></i>
                    <span class="nav-link-text">التجارب</span>
                </a>
            </li>
            @endif



            @if (auth()->user()->hasPermission('read_cancer'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.cancer.index') }}">
                    <i class="fas fa-hand-holding-heart text-red" style="color: #f4645f;"></i>
                    <span class="nav-link-text">التوعية والوقاية</span>
                </a>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.aid.index') }}">
                    <i class="fas fa-people-carry text-blue" style="color: #f4645f;"></i>
                    <span class="nav-link-text">المساعدات</span>
                </a>
            </li>




            </ul>
            <!-- Divider -->
        </div>
    </div>
    </div>
</nav>
