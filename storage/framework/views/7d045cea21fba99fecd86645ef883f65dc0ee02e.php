<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
    a<?php echo e(awtTrans('الصلاحيات')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="gx-card">
        <a href="<?php echo e(route('add_permission')); ?>" class="gx-btn gx-btn-primary">
            <i class="fa fa-plus-circle"></i> <span><?php echo e(awtTrans('اضافة صلاحية')); ?></span>
        </a>
    </div>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.table'); ?>
            <?php $__env->slot('tableHead'); ?>
                <th><?php echo e(awtTrans('الصلاحيه')); ?></th>
                <th><?php echo e(awtTrans('تعديل')); ?> </th>
                <th><?php echo e(awtTrans('حذف')); ?> </th>
            <?php $__env->endSlot(); ?>

            <?php $__env->slot('tableBody'); ?>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(awtTrans($role->role)); ?></td>
                        <td>
                            <a href="<?php echo e(route('edit_permission', $role->id)); ?>" >
                                <i class="zmdi zmdi-edit zmdi-hc-fw zmdi-hc-lg text-primary"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <i data-id = "<?php echo e($role->id); ?>" data-toggle="modal" data-target="#delete" class="delete zmdi zmdi-close zmdi-hc-fw zmdi-hc-lg text-danger"></i>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">حذف صلاحية ؟</h2>
                </div>
                <div class="modal-body">
                    <h3 style="margin-top: 35px"><?php echo e(awtTrans('هل تريد مواصلة عملية الحذف ؟')); ?></h3>
                    <div class="col_btn">
                        <form method="post" action="<?php echo e(route('delete_permission')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" id="id-permission" name="id" value="">
                            <button style="margin-top: 35px" type="submit" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 send-delete-all" style="margin-top: 19px"><?php echo e(awtTrans('حـذف')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(".delete").click(function () {
            let  id = $(this).data("id");
            $('#id-permission').val(id);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\newStandered\resources\views/dashboard/permissions/index.blade.php ENDPATH**/ ?>