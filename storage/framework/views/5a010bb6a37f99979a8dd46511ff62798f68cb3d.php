<?php $__env->startSection('title'); ?><?php echo e(awtTrans($pluralName)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.table'); ?>
        <?php $__env->slot('tableHead'); ?>
            <th><?php echo e(awtTrans('اسم مقدم الخدمه ')); ?></th>
            <th><?php echo e(awtTrans('رقم الهاتف')); ?></th> 
            <th><?php echo e(awtTrans('عدد الطلبات')); ?></th> 
            <th><?php echo e(awtTrans('المبلغ المستحق له')); ?></th>
            <th><?php echo e(awtTrans('المبلغ المستحق عليه')); ?></th>
            <th><?php echo e(awtTrans('تسويه جميع المستحقات')); ?></th>
            <th><?php echo e(awtTrans('تسويه المستحقات المستحقه له ')); ?></th>
            <th><?php echo e(awtTrans('تسويه المستحقات المستحقه عليه ')); ?></th>
        <?php $__env->endSlot(); ?>

        <?php $__env->slot('tableBody'); ?>
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($row['name']); ?></td>
                    <td><?php echo e($row['phone']); ?></td>
                    <td><?php echo e($row['orders_count']); ?></td>
                    <td><?php echo e(( $row['dueReservations'] * $commission ) / 100); ?></td>
                    <td><?php echo e((  $row['duePaidReservations'] * $commission ) / 100); ?></td>
                    <td>
                        <?php if($row['dueReservations'] > 0 || $row['duePaidReservations'] > 0): ?> <i class="fa fa-check  setteee" id="all_<?php echo e($row['id']); ?>" ></i><?php else: ?> <?php endif; ?>
                    </td>
                    
                    <td>
                        <?php if($row['dueReservations'] > 0): ?> <i class="fa fa-check  setteee" id="for_<?php echo e($row['id']); ?>" ><?php else: ?> <?php endif; ?>
                    </td>
                    
                    <td>
                        <?php if( $row['duePaidReservations'] > 0): ?> <i class="fa fa-check  setteee" id="from_<?php echo e($row['id']); ?>"></i><?php else: ?> <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
    </div>
 <?php $__env->startSection('script'); ?>
    <script>
         $('.setteee').on('click', function (e) {
            var type = this.id .split('_')
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('settlementUser')); ?>",
                data: {id : type[1] , type : type[0]},
                dataType: "json",
                success:  (response) => {
                    $(this).hide()
                    if(type[0] == 'all'){
                        $('.setteee').hide()
                    }
                    toastr.success('تمت عمليه التوسيه بنجاح')
                }
            });
         })
    </script>
 <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/dashboard/Settlement/index.blade.php ENDPATH**/ ?>