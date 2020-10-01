<td class="text-center">
    <i  data-toggle="modal" data-target="#show" class="show zmdi zmdi-eye  zmdi-hc-fw zmdi-hc-lg text-primary"
        <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            data-<?php echo e($key); ?>   = "<?php echo e($value); ?>"
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ></i>
</td><?php /**PATH C:\xampp\htdocs\app\resources\views/dashboard/shared/components/showbutton.blade.php ENDPATH**/ ?>