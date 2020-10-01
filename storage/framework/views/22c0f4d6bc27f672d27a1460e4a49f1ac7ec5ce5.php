<?php echo $__env->make('dashboard.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>
    <footer class="gx-footer Footer_login">
        <div class="last_footer">
            <p class="color_light"> Awamer ElShabaka &copy; <?php echo e(date("Y")); ?></p>
        </div>
    </footer>

<!-- END wrapper -->
<?php echo $__env->make('dashboard.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\app\resources\views/dashboard/layouts/loginapp.blade.php ENDPATH**/ ?>