<?php $__env->startSection('title'); ?><?php echo e(awtTrans($pluralName)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.reload'); ?> <?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('dashboard.shared.components.deleteall'); ?> <?php echo $__env->renderComponent(); ?>
    </div>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.table'); ?>
        <?php $__env->slot('tableHead'); ?>
            <th>
                <div class="form-checkbox">
                    <input type="checkbox" value="value1" name="name1" id="checkedAll">
                    <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                </div>
            </th>
            <th><?php echo e(awtTrans('الاسم')); ?>   </th>
            <th><?php echo e(awtTrans('#')); ?>   </th>
            <th><?php echo e(awtTrans('التاريخ')); ?></th>
            <th><?php echo e(awtTrans('عرض')); ?>    </th>
            <th><?php echo e(awtTrans('حذف')); ?>    </th>
        <?php $__env->endSlot(); ?>

        <?php $__env->slot('tableBody'); ?>
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="hide_on_delete_<?php echo e($row->id); ?>">
                    <td class="text-center">
                        <div class="form-checkbox">
                            <input type="checkbox" class="checkSingle" id="<?php echo e($row->id); ?>">
                            <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                        </div>
                    </td>
                    <td><?php echo e($row->user->name); ?></td>
                    <td><?php echo e($row->user->type == 'user' ? 'مستخدم' : 'مقدم خدمه'); ?></td>
                    <td><?php echo e($row->created_at->diffForHumans()); ?></td>
                    <?php $__env->startComponent('dashboard.shared.components.showbutton', ['row' =>[
                        'id'          => $row->id ,
                        'user'        => $row->user->name ,
                        'complaint'  => $row->complaint ,
                    ]]); ?><?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('dashboard.shared.components.deletebutton', ['id' => $row->id]); ?> <?php echo $__env->renderComponent(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
    </div>
    <?php $__env->startComponent('dashboard.shared.components.showmodel'); ?>
        <?php $__env->slot('ShowModelContent'); ?>
            <div class="form-group col-sm-6 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('اسم المستخدم')); ?></label>
                <input type="text"class="form-control user" autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الشكوي')); ?></label>
                <textarea cols="30" rows="10"  class="form-control complaint" required></textarea>
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('dashboard.shared.components.deleteallmodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.deletemodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.scripts'); ?>  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/dashboard/complaints/index.blade.php ENDPATH**/ ?>