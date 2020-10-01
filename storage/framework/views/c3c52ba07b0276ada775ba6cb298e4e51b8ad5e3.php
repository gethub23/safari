<?php if($errors->any()): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger text-center">
                <ul>
                    <script>
                        toastr.error("<?php echo e(awtTrans($errors->first())); ?>")
                    </script>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if(session()->has('success')): ?>
    <script>
        toastr.success("<?php echo awtTrans(session()->get('success')); ?>")
    </script>
<?php endif; ?>

<?php if(session()->has('danger')): ?>
    <script>
        toastr.error("<?php echo awtTrans(session()->get('danger')); ?>")
    </script>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\newStandered\resources\views/dashboard/layouts/sessions.blade.php ENDPATH**/ ?>