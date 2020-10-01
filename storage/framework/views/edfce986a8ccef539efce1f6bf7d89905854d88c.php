<?php echo $__env->make('dashboard.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="gx-container">
        <?php echo $__env->make('dashboard.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <footer class="gx-footer Footer">
            <div class="last_footer">
                <p class="color_black"> Awamer ElShabaka &copy; <?php echo e(date("Y")); ?></p>
            </div>
        </footer>
        <div class="gx-main-container">
            <?php echo $__env->make('dashboard.layouts.headerNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="gx-main-content">
                <div class="gx-wrapper">
                        <div class="dashboard animated slideInUpTiny animation-duration-3">
                        <?php echo $__env->make('dashboard.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <?php echo $__env->yieldContent('content'); ?>

                    </div>
                </div>
            </div>
        </div>





    </div>
<!-- END wrapper -->
<?php echo $__env->make('dashboard.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('dashboard.layouts.sessions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\newStandered\resources\views/dashboard/layouts/app.blade.php ENDPATH**/ ?>