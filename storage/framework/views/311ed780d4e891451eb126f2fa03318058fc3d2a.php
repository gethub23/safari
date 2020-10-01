<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard Created By Eng/Ahmed Abdullah">
    <meta name="keywords" content="Dashboard Created By Eng/Ahmed Abdullah">
    <meta name="author" content="Eng/Ahmed Abdullah">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>
        <?php echo e(settings('name_'.lang())); ?> |  <?php echo $__env->yieldContent('title'); ?>
    </title>

    <?php echo $__env->yieldContent('styles'); ?>
    <!-- Site favicon -->
    <link href='<?php echo e(asset('/images/site/fav.png')); ?>' rel='shortcut icon' type='image/x-icon'  />
    <link href="<?php echo e(asset('/design/admin/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')); ?>" rel="stylesheet" >
    <link href="<?php echo e(asset('/design/admin/fonts/fontawesome/css/font-awesome.min.css')); ?>" rel="stylesheet" >
    <link href="<?php echo e(asset('/design/admin/fonts/weather-icons-master/css/weather-icons.min.css')); ?>" rel="stylesheet" >
    <link href="<?php echo e(asset('/design/admin/css/jumbo-bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/perfect-scrollbar/css/perfect-scrollbar.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/chartist/dist/chartist.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/c3/c3.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/css/jumbo-bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/css/jumbo-core.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/css/theme-dark-indigo.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/css/bootstrap-editable.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/css/bootstrap-table.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/css/jumbo-forms.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/nouislider/distribute/nouislider.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/css/toastr.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/dropzone/dist/dropzone.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/datepicker-bootstrap/css/core.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/datepicker-bootstrap/css/datepicker.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/node_modules/bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/design/admin/css/style.css')); ?>" rel="stylesheet">
    <?php if(app()->getLocale() == 'en'): ?>
        <link href="<?php echo e(asset('/design/admin/css/en.css')); ?>" rel="stylesheet">
    <?php else: ?>
        <link href="<?php echo e(asset('/design/admin/css/ar.css')); ?>" rel="stylesheet">
    <?php endif; ?>
    <link rel="manifest" href="https://ahmed-taha.arabsdesign.com/manifest.json">

</head>

<body id="body" data-theme="dark-indigo">
    <!-- Loader Backdrop -->
<div class="loader-backdrop">
    <!-- Loader -->
    <div class="loader loading_page">
        <div class="loading">
            <span> <?php echo e(awtTrans('داش بورد')); ?> <?php echo e(settings('name_'.lang())); ?></span>
        </div>
    </div>
    <!-- /loader-->
</div>
<!-- loader backdrop -->
<?php /**PATH /home/dashbaai/public_html/resources/views/dashboard/layouts/header.blade.php ENDPATH**/ ?>