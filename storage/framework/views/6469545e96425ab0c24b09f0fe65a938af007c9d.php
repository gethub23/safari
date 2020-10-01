<div class="modal fade" id="edit" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <?php echo $__env->make('dashboard.shared.ajax.loder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="modal-header border-0">
                <h2 class="modal-title" id="exampleModalCenterTitle"> <?php echo e(awtTrans('تعديل')); ?> <?php echo e(awtTrans($singleName)); ?></h2>
            </div>
            <div class="modal-body">
                <form action="" method="post" autocomplete="off" enctype="multipart/form-data" id="edit_form">
                    <?php echo e(csrf_field()); ?>

                    <?php echo method_field('PUT'); ?>
                    <div class="container">
                        <div class="row">
                             <input type="text" name="id" id="id" hidden>
                            <?php echo e($EditModelContent); ?>

                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <hr>
                        <a href="javascript:void(0)" class="btn text-secondary card-link" data-dismiss="modal"><?php echo e(awtTrans('اغلاق')); ?></a>
                        <button type="submit"  class="btn text-primary card-link"><?php echo e(awtTrans('تعديل')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/dashbaai/public_html/resources/views/dashboard/shared/components/editmodel.blade.php ENDPATH**/ ?>