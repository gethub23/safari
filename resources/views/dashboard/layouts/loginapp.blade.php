@include('dashboard.layouts.header')

    @yield('content')
    <footer class="gx-footer Footer_login">
        <div class="last_footer">
            <p class="color_light"> Awamer ElShabaka &copy; {{date("Y")}}</p>
        </div>
    </footer>

<!-- END wrapper -->
@include('dashboard.layouts.footer')
