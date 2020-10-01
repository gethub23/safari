<div class="page-heading d-sm-flex justify-content-sm-between align-items-sm-center">
    <h2 class="title mb-3 mb-sm-0"><?php echo $__env->yieldContent('title'); ?></h2>
    <nav class="mb-0 breadcrumb">
        <a href="<?php echo e(url('/admin')); ?>" class="breadcrumb-item"><?php echo e(awtTrans('الرئيسيه')); ?></a>
        <?php if( \Request::route()->getName() != 'dashboard'): ?>
            <span class="active breadcrumb-item"><?php echo e(awtTrans(\Request::route()->getAction()['title'])); ?></span>
        <?php endif; ?>
    </nav>
</div><?php /**PATH C:\xampp\htdocs\newStandered\resources\views/dashboard/layouts/breadcrumb.blade.php ENDPATH**/ ?>