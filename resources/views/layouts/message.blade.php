@if (session()->has('errors'))
<div class="container text-center">

    <ol class="alert alert-danger m-auto list-unstyled" style="width:40%; font-size:20px">
        @foreach ($errors->all() as $message)
        <li class="font-weight-bold" >
            {{ $message }}
        </li>
        @endforeach
    </ol>
</div>
@endif



@if (session()->has('added'))
<div class="container">
    <div class="alert alert-info text-center m-auto font-weight-bold" style="width:40%; font-size:20px">
        {{ session('added') }}
    </div>
</div>
@endif

@if (session()->has('updated'))
<div class="container">
    <div class="alert alert-info text-center m-auto font-weight-bold" style="width:40%; font-size:20px">
        {{ session('updated') }}
    </div>
</div>
@endif


@if (session()->has('deleted'))
<div class="container">
    <div class="alert alert-info text-center m-auto font-weight-bold" style="width:40%; font-size:20px">
        {{ session('deleted') }}
    </div>
</div>
@endif


@if (session()->has('success'))
<div class="container">
    <div class="alert alert-info text-center m-auto font-weight-bold" style="width:40%; font-size:20px">
        {{ session('success') }}
    </div>
</div>
@endif



@if (session()->has('error'))
<div class="container">
    <div class="alert alert-danger text-center m-auto font-weight-bold" style="width:40%; font-size:20px">
        {{ session('error') }}
    </div>
</div>
@endif
