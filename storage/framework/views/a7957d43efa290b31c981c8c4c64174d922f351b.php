<?php $__currentLoopData = $additions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<form action="<?php echo e(url('admin/updateAddition/'.$addition->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="additions-collection">
        <input type="text" class="form-control" name="addition_ar" value="<?php echo e($addition->addition_ar); ?>" placeholder="<?php echo e(awtTrans('اسم الاضافه بالعربيه')); ?>" <?php echo e($type == 0  ? 'required' : 'readonly'); ?>>
        <input type="text" class="form-control" name="addition_en" value="<?php echo e($addition->addition_en); ?>" placeholder="<?php echo e(awtTrans('اسم الاضافه بالانجليزيه')); ?>" <?php echo e($type == 0  ? 'required' : 'readonly'); ?> >
         <?php if($type == 0): ?>
            <input type="file" class="form-control" name="image">
        <?php endif; ?>
        <img src="<?php echo e(url('public/images/services/'.$addition->image)); ?>" width="100px" height="100px" style="border-radius: 21px;padding: 4px;">
        <?php if($type == 0): ?>
            <button class="remove-addition delete_addition" data-id="<?php echo e($addition->id); ?>"><i class="fa fa-close" aria-hidden="true"></i></button>
            <button type="submit"><i class="fa fa-file" aria-hidden="true"></i></button>
        <?php endif; ?>
    </div>
</form>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\safari\resources\views/dashboard/services/additions.blade.php ENDPATH**/ ?>