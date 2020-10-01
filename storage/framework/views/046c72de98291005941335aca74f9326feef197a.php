<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="uploaded-block">
        <img src="<?php echo e(url('public/images/services/'.$image->image)); ?>">
        <button class="remove" id="<?php echo e($image->id); ?>}">&times;</button>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\safari\resources\views/dashboard/services/images.blade.php ENDPATH**/ ?>