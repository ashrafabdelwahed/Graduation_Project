@php

use App\Category;

$categories = Category::orderBy('id', 'DESC')->limit(5)->get();

@endphp


<!-- start navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href=" {{ route('home') }} ">انت
                <span class="text-primary" style="font-weight: bold;">
                    تقدر
                    <i class="fas fa-heart"></i>
                    <!-- <i class="fas fa-hand-scissors"  style="transform: rotate(40deg);"></i> -->
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">الصفحة الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('cancer') }} ">مركز التوعية</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">المقالات والابحاث</a>
                    </li> -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            المقالات والابحاث
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @foreach ($categories as $category)
                                <li><a class="dropdown-item" href=" {{ route('category.show', $category->slug) }} "> {{ $category->name }} </a></li>
                            @endforeach

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('categories') }}">عرض كل الاقسام</a></li>
                            <!-- <li><a class="dropdown-item" href="#">عرض كل المقالات</a></li> -->
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('experiments') }}">تجارب الناجين</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"> انشاء حساب</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white" href="{{ route('aid') }}">اتبرع اونلاين</a>
                    </li>

                </ul>




                <form class="d-flex" action=" {{ route('search') }} " method="POST">
                    @csrf
                    <input class="form-control me-2" type="search" name="search" placeholder="بحث" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">بحث</button>
                </form>



            </div>
        </div>
    </nav>
<!-- end navbar -->
