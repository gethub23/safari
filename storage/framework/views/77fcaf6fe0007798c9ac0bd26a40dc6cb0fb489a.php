
<?php $__env->startSection('title'); ?>  <?php echo e(awtTrans('التقارير')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="gx-card">
        <a href="<?php echo e(route('deletereports')); ?>" class="gx-btn btn-danger">
            <i class="fa fa-trash"></i> <span><?php echo e(awtTrans('حذف الكل')); ?></span>
        </a>
    </div>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.table'); ?>
        <?php $__env->slot('tableHead'); ?>
            <th><?php echo e(awtTrans('العضو')); ?></th>
            <th><?php echo e(awtTrans('الحدث')); ?></th>
            <th>IP</th>
            <th><?php echo e(awtTrans('البلد')); ?></th>
            <th><?php echo e(awtTrans('المنطقة')); ?></th>
            <th><?php echo e(awtTrans('المدينة')); ?></th>
            <th><?php echo e(awtTrans('التاريخ')); ?></th>
        <?php $__env->endSlot(); ?>

        <?php $__env->slot('tableBody'); ?>
            <?php $__currentLoopData = $supervisorReports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row">
                        <img src="<?php echo e(asset('public/images/users/'.$r->User->avatar)); ?>" class="img-circle img-responsive img-rounded" width="30px" height="30px">
                    </th>
                    <td><?php echo e($r->event); ?></td>
                    <td><?php echo e($r->ip); ?></td>
                    <td><?php echo e($r->country); ?></td>
                    <td><?php echo e($r->area); ?></td>
                    <td><?php echo e($r->city); ?></td>
                    <td><?php echo e($r->created_at->diffForHumans()); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmedtahaarabsde/public_html/dashboard_test/resources/views/dashboard/reports/index.blade.php ENDPATH**/ ?>