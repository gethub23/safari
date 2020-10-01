<?php $__env->startSection('title'); ?><?php echo e(awtTrans($pluralName)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.reload'); ?> <?php echo $__env->renderComponent(); ?>
    </div>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.table'); ?>
        <?php $__env->slot('tableHead'); ?>
            <th><?php echo e(awtTrans('رقم الطلب')); ?> </th>
            <th><?php echo e(awtTrans(' المستخدم ')); ?></th>
            <th><?php echo e(awtTrans('مقدم الخدمه ')); ?></th>
            <th><?php echo e(awtTrans(' الخدمه ')); ?></th>
            <th><?php echo e(awtTrans('السعر ')); ?></th>
            <th><?php echo e(awtTrans('نوع الدفع ')); ?></th>
            <th><?php echo e(awtTrans('تم الدفع ')); ?></th>
            <th><?php echo e(awtTrans('التاريخ')); ?></th>
            <th><?php echo e(awtTrans('عرض')); ?> </th>
        <?php $__env->endSlot(); ?>

        <?php $__env->slot('tableBody'); ?>
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="hide_on_delete_<?php echo e($row->id); ?>">
                    <td><?php echo e($row->id); ?></td>
                    <td><?php echo e($row->user->name); ?></td>
                    <td><?php echo e($row->provider->name); ?></td>
                    <td><?php echo e($row->service->title); ?></td>
                    <td><?php echo e($row->price); ?></td>
                    <td><?php echo e($row->payment_type == 1 ? 'اونلاين ' : 'كاش'); ?></td>
                    <td><?php echo e($row->payment_type == 1 ? 'تم الدفع ' : ($row->paied == 1 ? 'تم الدفع ' : " لم يتم الدفع" )); ?></td>
                    <td><?php echo e($row->created_at->diffForHumans()); ?></td>
                    <?php $__env->startComponent('dashboard.shared.components.showbutton', ['row' =>[
                        'id'            => $row->id ,
                        'user'          => $row->user->name ,
                        'provider'      => $row->provider->name ,
                        'service'       => $row->service->title ,
                        'price'         => $row->price ,
                        'payment_type'  => $row->payment_type == 1 ? 'اونلاين' : 'كاش' ,
                        'paied'         => $row->paied ,
                        'date'          => $row->date ,
                        'quantity'      => $row->quantity == null ? 'لا يتوافر كميات' : $row->quantity ,
                        'cancel_by'     => $row->cancel_by == 'user' ? 'المستخدم' : 'مقدم الخدمه' ,
                    ]]); ?><?php echo $__env->renderComponent(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
    </div>
   <?php $__env->startComponent('dashboard.shared.components.showmodel'); ?>
        <?php $__env->slot('ShowModelContent'); ?>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('المستخدم')); ?></label>
                <input class="form-control user"  >
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('مقدم الخدمه')); ?></label>
                <input class="form-control provider"  >
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الخدمه')); ?></label>
                <input class="form-control service"  >
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('السعر')); ?></label>
                <input class="form-control price"  >
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('نوع الدفع')); ?></label>
                <input class="form-control payment_type"  >
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('تاريخ الحجز')); ?></label>
                <input class="form-control date"  >
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الكميه')); ?></label>
                <input class="form-control quantity"  >
            </div>
             <?php if($status == 3 ): ?>     
                <div class="form-group col-sm-6 col-md-6 mw-100">
                    <label for="field-1" class="control-label"> <?php echo e(awtTrans('تم الالغاء عبر ')); ?></label>
                    <input class="form-control cancel_by"  >
                </div>
            <?php endif; ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.scripts'); ?>  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/dashboard/reservations/index.blade.php ENDPATH**/ ?>