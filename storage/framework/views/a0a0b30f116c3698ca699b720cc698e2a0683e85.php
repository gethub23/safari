<div class="modal fade" id="add_model" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <?php echo $__env->make('dashboard.shared.ajax.loder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="modal-header border-0">
                <h2 class="modal-title" id="exampleModalCenterTitle"><?php echo e(awtTrans('اضافه')); ?> <?php echo e(awtTrans($singleName)); ?></h2>
            </div>
            <div class="modal-body">
                <form  id="add_form_submit" action="<?php echo e(isset($withRoutes) ? route($addRoute) :  url('admin/'.$routeName)); ?>" method="post" autocomplete="off" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="container">
                        <div class="row">
                            <?php echo e($AddModelContent); ?>

                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <a href="javascript:void(0)" class="btn text-secondary card-link" data-dismiss="modal">اغلاق</a>
                        <button type="submit"  class="btn text-primary card-link"><?php echo e(awtTrans('اضافه')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/ahmedtahaarabsde/public_html/dashboard_test/resources/views/dashboard/shared/components/addmodel.blade.php ENDPATH**/ ?>