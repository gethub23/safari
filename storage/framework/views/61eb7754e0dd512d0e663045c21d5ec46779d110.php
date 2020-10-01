<?php $__env->startSection('title'); ?>
    <?php echo e(awtTrans('الرئيسية')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="wather_time" style="margin: 50px 0;">
        <div class="frame_time">
            <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=small&timezone=Asia%2FRiyadh" width="100%" height="115" frameborder="0" seamless></iframe>
        </div>
        <div class="wather_app">
            <a class="weatherwidget-io" href="https://forecast7.com/ar/23d8945d08/saudi-arabia/" data-label_1="SAUDI ARABIA" data-label_2="WEATHER" data-theme="original" >SAUDI ARABIA WEATHER</a>
            <script>
                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
            </script>
        </div>
    </div>

    <div class="Block_Section flex_space">
        <?php $__currentLoopData = Home(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url($h['url'])); ?>" style="background-color: <?php echo e($h['color']); ?>">
                <div class="Gx_Block">
                    <div class="Gx_Card" style="color: <?php echo e($h['color']); ?>">
                        <span><?php echo $h['icon']; ?></span>
                    </div>
                    <div class="Gx_Body flex_space">
                        <strong style="color: <?php echo e($h['color']); ?>"><?php echo e($h['count']); ?></strong>
                        <h3 class="color_light"><?php echo e(awtTrans($h['name'])); ?> </h3>
                    </div>
                </div>
            </a>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmedtahaarabsde/public_html/dashboard_test/resources/views/dashboard/dashboard/index.blade.php ENDPATH**/ ?>