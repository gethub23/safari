<?php $__env->startSection('title'); ?>
    <?php echo e(awtTrans('الرئيسية')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="Block_Section flex_space">
        <?php $__currentLoopData = Home(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url($h['url'])); ?>" style="background-color: <?php echo e($h['color']); ?>">
                <div class="Gx_Block">
                    <div class="Gx_Card" style="color: <?php echo e($h['color']); ?>">
                        <span><?php echo $h['icon']; ?></span>
                    </div>
                    <div class="Gx_Body flex_space">
                        <div class="" style="position: relative;display: inline-flex">
                            <span class="shape" style="border: 3px dotted <?php echo e($h['color']); ?>;"></span>
                            <strong style="color: <?php echo e($h['color']); ?>"><?php echo e($h['count']); ?></strong>
                        </div>
                        <h3 class="color_light"><?php echo e(awtTrans($h['name'])); ?> </h3>
                    </div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dashbaai/public_html/resources/views/dashboard/dashboard/index.blade.php ENDPATH**/ ?>