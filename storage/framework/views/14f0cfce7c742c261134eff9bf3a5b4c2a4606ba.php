<div id="menu" class="side-nav gx-sidebar">
    <div class="navbar-expand-lg">

        <!-- logo header  -->
        <a class="site-logo" href="<?php echo e(url('/admin')); ?>">
            <img src="<?php echo e(url('public/images/site/logo.png')); ?>" alt="Jumbo" title="Jumbo">
        </a>

        <!-- Main navigation -->
        <div id="main-menu" class="main-menu navbar-collapse collapse">
            <div class="over_lay"></div>
            <ul class="nav-menu">
                <li class="nav-header"><span class="nav-text"></span></li>
                <?php echo e(sidebar()); ?>


            </ul>
        </div>
        <!-- /main navigation -->
    </div>
</div>
<?php /**PATH /home/ahmedtahaarabsde/public_html/dashboard_test/resources/views/dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>