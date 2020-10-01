<div class="modal fade" id="deleteAll" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo $__env->make('dashboard.shared.ajax.loder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle"><?php echo e(awtTrans('حذف جميع المحدد ؟')); ?></h2>
            </div>
            <div class="modal-body">
                <h3><?php echo e(awtTrans('هل تريد مواصلة عملية الحذف ؟')); ?></h3>
                <?php if(isset($deleteMessage)): ?>
                     <h1 class="text-danger text-center " style="font-size: 20px"><?php echo e(awtTrans($deleteMessage)); ?></h1>
                <?php endif; ?>
                <div class="col_btn">
                    <button type="submit" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 send-delete-all"><?php echo e(awtTrans('حـذف')); ?></button>
                    <button type="submit" class="btn btn_black btn-rounded w-md waves-effect waves-light m-b-5 send-delete-all" data-toggle="modal" data-dismiss="modal"><?php echo e(awtTrans('إلغاء')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/dashbaai/public_html/resources/views/dashboard/shared/components/deleteallmodel.blade.php ENDPATH**/ ?>