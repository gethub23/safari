@include('dashboard.layouts.header')
    <div class="gx-container">
        @include('dashboard.layouts.sidebar')

        <footer class="gx-footer Footer">
            <div class="last_footer">
                <p class="color_black"> Awamer ElShabaka &copy; {{date("Y")}}</p>
            </div>
        </footer>
        <div class="gx-main-container">
            @include('dashboard.layouts.headerNav')
            <div class="gx-main-content">
                <div class="gx-wrapper">
                        <div class="dashboard animated slideInUpTiny animation-duration-3">
                        @include('dashboard.layouts.breadcrumb')

                            @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END wrapper -->
@include('dashboard.layouts.footer')
@include('dashboard.layouts.sessions')
