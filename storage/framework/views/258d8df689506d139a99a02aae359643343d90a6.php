<?php if($errors->any()): ?>
    <script>
        toastr.error("<?php echo e(awtTrans($errors->first())); ?>")
    </script>
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
<?php endif; ?><?php /**PATH /home/dashbaai/public_html/resources/views/dashboard/layouts/sessions.blade.php ENDPATH**/ ?>