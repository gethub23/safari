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
            <th><?php echo e(awtTrans('مقدم الخدمه')); ?> </th>
            <th><?php echo e(awtTrans('اسم البنك')); ?> </th>
            <th><?php echo e(awtTrans('رقم الحساب')); ?></th>
            <th><?php echo e(awtTrans('رقم الايبان')); ?></th>
            <th><?php echo e(awtTrans('اسم صاحب الحساب')); ?></th>
            <th><?php echo e(awtTrans('التاريخ')); ?></th>
            <th><?php echo e(awtTrans('عرض')); ?> </th>
            <th><?php echo e(awtTrans('حذف')); ?> </th>
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
                    <td><?php echo e($row->bank_name); ?></td>
                    <td><?php echo e($row->account_number); ?></td>
                    <td><?php echo e($row->iban_number); ?></td>
                    <td><?php echo e($row->user_name); ?></td>
                    <td><?php echo e($row->created_at->diffForHumans()); ?></td>
                    <?php $__env->startComponent('dashboard.shared.components.showbutton', ['row' =>[
                        'id'              => $row->id ,
                        'bank_name'       => $row->bank_name ,
                        'account_number'  => $row->account_number ,
                        'user'            => $row->user->name ,
                        'user_name'       => $row->user_name ,
                        'iban_number'     => $row->iban_number ,
                    ]]); ?><?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('dashboard.shared.components.deletebutton', ['id' => $row->id]); ?> <?php echo $__env->renderComponent(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
    </div>
    <?php $__env->startComponent('dashboard.shared.components.showmodel'); ?>
        <?php $__env->slot('ShowModelContent'); ?>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('مقدم الخدمه')); ?></label>
                <input  class="form-control user"  >
            </div>

             <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('اسم صاحب الحساب')); ?></label>
                <input  class="form-control user_name"  >
            </div>

             <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('اسم البنك')); ?></label>
                <input class="form-control account_number"  >
            </div>

             <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('رقم الحساب')); ?></label>
                <input class="form-control user"  >
            </div>

             <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('رقم الايبان')); ?></label>
                <input class="form-control iban_number"  >
            </div>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.deleteallmodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.deletemodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.scripts'); ?>  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/dashboard/bankaccounts/index.blade.php ENDPATH**/ ?>