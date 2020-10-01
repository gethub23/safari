<?php $__env->startSection('title'); ?><?php echo e(awtTrans($pluralName)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.reload'); ?> <?php echo $__env->renderComponent(); ?>
    </div>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.table'); ?>
        <?php $__env->slot('tableHead'); ?>
            <th><?php echo e(awtTrans('العنوان بالعربيه')); ?></th>
            <th><?php echo e(awtTrans('الوصف بالعربيه')); ?></th>
            <th><?php echo e(awtTrans('التاريخ')); ?></th>
            <th><?php echo e(awtTrans('تعديل')); ?> </th>
            <th><?php echo e(awtTrans('عرض')); ?> </th>
        <?php $__env->endSlot(); ?>

        <?php $__env->slot('tableBody'); ?>
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($row->title_ar); ?></td>
                    <td><?php echo e($row->description_en); ?></td>
                    <td><?php echo e($row->created_at->diffForHumans()); ?></td>
                    <?php $__env->startComponent('dashboard.shared.components.editbutton', ['row'     =>[
                        'id'               => $row->id ,
                        'title_ar'         => $row->title_ar ,
                        'title_en'         => $row->title_en ,
                        'description_ar'   => $row->description_ar ,
                        'description_en'   => $row->description_en ,
                    ]]); ?><?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('dashboard.shared.components.showbutton', ['row' =>[
                        'id'               => $row->id ,
                        'title_ar'         => $row->title_ar ,
                        'title_en'         => $row->title_en ,
                        'description_ar'   => $row->description_ar ,
                        'description_en'   => $row->description_en ,
                    ]]); ?><?php echo $__env->renderComponent(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
    </div>
    <?php $__env->startComponent('dashboard.shared.components.editmodel'); ?>
        <?php $__env->slot('EditModelContent'); ?>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالعربيه')); ?></label>
                <input type="text" name="title_ar" id="title_ar" class="form-control"   placeholder="<?php echo e(awtTrans('ادخل العنوان بالعربيه')); ?>" autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالانجليزيه')); ?></label>
                <input type="text" name="title_en" id="title_en" class="form-control"   placeholder="<?php echo e(awtTrans('ادخل العنوان بالانجليزيه')); ?>" autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans(' الوصف بالعربيه')); ?></label>
                <textarea name="description_ar" id="description_ar" id="" cols="30" rows="10"  class="form-control" required><?php echo e(awtTrans('ادخل الوصف بالعربيه ')); ?></textarea>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالانجليزيه')); ?></label>
                <textarea name="description_en" id="description_en" id="" cols="30" rows="10"  class="form-control" required><?php echo e(awtTrans('ادخل الوصف بالانجليزيه')); ?></textarea>
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('dashboard.shared.components.showmodel'); ?>
        <?php $__env->slot('ShowModelContent'); ?>
           <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالعربيه')); ?></label>
                <input type="text"  class="form-control title_ar">
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالانجليزيه')); ?></label>
                <input type="text" class="form-control title_en" >
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans(' الوصف بالعربيه')); ?></label>
                <textarea cols="30" rows="10"  class="form-control description_ar" ></textarea>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالانجليزيه')); ?></label>
                <textarea cols="30" rows="10"  class="form-control description_en"></textarea>
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.scripts'); ?>  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/dashboard/intros/index.blade.php ENDPATH**/ ?>