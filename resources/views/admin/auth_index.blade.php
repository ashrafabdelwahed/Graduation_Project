@include('admin.layouts.header')

<body class="main-content bg-default g-sidenav-show g-sidenav-pinned">

    @include('admin.layouts.auth_navbar')

    <div class="main-content bg-default g-sidenav-show g-sidenav-pinned" id="panel">
        @yield('content')
    </div>

    @include('admin.layouts.footer')
