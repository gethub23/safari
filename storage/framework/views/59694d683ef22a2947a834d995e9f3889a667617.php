<div class="modal fade" id="delete" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo $__env->make('dashboard.shared.ajax.loder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle"><?php echo e(awtTrans('حذف')); ?> <?php echo e(awtTrans($singleName)); ?></h2>
            </div>
            <div class="modal-body">
                <p  class=" text-center "><?php echo e(awtTrans('هل تريد مواصلة عملية الحذف ؟')); ?></p>
                <?php if(isset($deleteMessage)): ?>
                     <h1 class="text-danger text-center " style="font-size: 20px"><?php echo e(awtTrans($deleteMessage)); ?></h1>
                <?php endif; ?>
                <form action="" method="post" id="delete_form">
                    <input type="text" id="delete_id" hidden>
                    <?php echo e(csrf_field()); ?>

                    <?php echo method_field('delete'); ?>
                    <div class="col_btn">
                        <a href="javascript:void(0)" class="btn text-secondary card-link" data-dismiss="modal"><?php echo e(awtTrans('تراجع')); ?></a>
                        <button type="submit" class="btn text-primary card-link" ><?php echo e(awtTrans('حذف')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/dashbaai/public_html/resources/views/dashboard/shared/components/deletemodel.blade.php ENDPATH**/ ?>