<?php $__env->startSection('title'); ?>
    <?php echo e(awtTrans('الصلاحيات')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="flex_space">
                    <div class="checkbox checkbox-replace checkbox-danger pull-right">
                        <label for="checkedAll"><?php echo e(awtTrans('تحديد الكل')); ?></label>
                        <input type="checkbox" id="checkedAll" class="parent">
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        <form action="<?php echo e(route('store_permission')); ?>" method="post" id="permissionForm" >
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="role"><?php echo e(awtTrans('اسم الصلاحية')); ?></label>
                                        <div>
                                            <input type="text"  class="form-control"  name="role" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="gx-card p-0 no-shadow bg-transparent">
                                        <div class="gx-card-body ">
                                            <div class="price-tables row pt-default d-flex justify-content-around">
                                                <?php echo e(addPermission()); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row text-center">
                                <div class="col-12">
                                    <button type="submit" class="btn_button btn_primary"><?php echo e(awtTrans('حــفــظ')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div><!-- end col -->
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>

        $('.parent').change(function () {
            var id = '.' + $(this).attr('id');

            if (this.checked) {
                $(id).each(function () {
                    this.checked = true
                })
            } else {
                $(id).each(function () {
                    this.checked = false;
                })
            }
        });

        $("#checkedAll").change(function () {
            if (this.checked) {
                $("input[type=checkbox]").each(function () {
                    this.checked = true
                })
            } else {
                $("input[type=checkbox]").each(function () {
                    this.checked = false;
                })
            }
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dashbaai/public_html/resources/views/dashboard/permissions/create.blade.php ENDPATH**/ ?>