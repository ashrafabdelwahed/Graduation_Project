<footer class="footer mt-auto py-3 bg-dark text-white text-center">
    <div class="container">
        جميع الحقوق محفوظة &copy;
        الجمعية المصرية للسرطان 2021
    </div>
</footer>

<script src="{{  asset('front_end/vendor/js/popper.min.js') }}"
    integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
</script>
<script src="{{  asset('front_end/vendor/js/bootstrap.min.js') }}"
    integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
</script>


<script src="{{ url('admin_design/vendor/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.config.language = "ar";
</script>


@yield('js')


</body>

</html>
