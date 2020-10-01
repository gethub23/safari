<div id="menu" class="side-nav gx-sidebar">
    <div class="navbar-expand-lg">

        <!-- logo header  -->
        <a class="site-logo" href="{{url('/admin')}}">
            <img src="{{appPath()}}/images/site/logo.png" alt="Jumbo" title="Jumbo">
        </a>

        <!-- Main navigation -->
        <div class="" style="position: relative">
            <div class="over_lay"></div>
            <div id="main-menu" class="main-menu navbar-collapse collapse">
                <ul class="nav-menu">
                    <li class="nav-header"><span class="nav-text"></span></li>
                    {{sidebar()}}

                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
