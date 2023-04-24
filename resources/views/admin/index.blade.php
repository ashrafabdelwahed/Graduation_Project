@include('admin.layouts.header')


<body>

@include('admin.layouts.navbar')

    <div class="main-content" id="panel">
        @include('admin.layouts.menu')

        @yield('content')

    </div>

    @include('admin.layouts.footer')
