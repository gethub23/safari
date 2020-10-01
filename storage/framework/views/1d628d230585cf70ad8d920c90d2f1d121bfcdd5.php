<?php $__env->startSection('title'); ?> <?php echo e(awtTrans('الإعدادات')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="gx-card">
        <div class="gx-card-body tabs-container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true"><?php echo e(awtTrans('إعدادات التطبيق')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#about" role="tab"
                       aria-controls="profile" aria-selected="true"><?php echo e(awtTrans('عن التطبيق')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#terms" role="tab"
                       aria-controls="profile" aria-selected="true"><?php echo e(awtTrans('الشروط والاحكام')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#sms" role="tab"
                       aria-controls="profile" aria-selected="true"><?php echo e(awtTrans('بيانات باقه الرسائل')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#social" role="tab"
                       aria-controls="profile" aria-selected="true"><?php echo e(awtTrans('مواقع التواصل')); ?>

                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane active">
                    <div class="card-body">
                        <form class="form-horizontal gx-card" role="form" enctype="multipart/form-data" method="post" action="<?php echo e(route('sitesetting')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label class="control-label" for="name_ar"><?php echo e(awtTrans('اسم التطبيق')); ?></label>
                                <div>
                                    <input required type="text" id="example-email" value="<?php echo e(settings('name_ar')); ?>" name="name_ar" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name_en"><?php echo e(awtTrans('اسم التطبيق بالانجليزيه')); ?> </label>
                                <div>
                                    <input required type="text" id="example-email" value="<?php echo e(settings('name_en')); ?>" name="name_en" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4 col-md-4 mw-100">
                                    <div class="text-center">
                                        <div class="images-upload-block">
                                            <label class="upload-img">
                                                <input type="file" accept="image/*" class="image-uploader" name="site_logo" >
                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                            </label>
                                            <div class="upload-area">
                                                <div class="uploaded-block" data-count-order="0">
                                                    <img src="<?php echo e(url('public/images/site/logo.png')); ?>">
                                                    <button class="close">×</button>
                                                </div>
                                            </div>
                                            <div class="upload-area"></div>
                                            <h5><?php echo e(awtTrans('لوجو الموقع')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 col-md-4 mw-100">
                                    <div class="text-center">
                                        <div class="images-upload-block">
                                            <label class="upload-img">
                                                <input type="file" accept="image/*" class="image-uploader" name="favicon" >
                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                            </label>
                                            <div class="upload-area">
                                                <div class="uploaded-block" data-count-order="0">
                                                    <img src="<?php echo e(url('public/images/site/fav.png')); ?>">
                                                    <button class="close">×</button>
                                                </div>
                                            </div>
                                            <div class="upload-area"></div>
                                            <h5><?php echo e(awtTrans('Fav Icon')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 col-md-4 mw-100">
                                    <div class="text-center">
                                        <div class="images-upload-block">
                                            <label class="upload-img">
                                                <input type="file" accept="image/*" class="image-uploader" name="loginBg" >
                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                            </label>
                                            <div class="upload-area">
                                                <div class="uploaded-block" data-count-order="0">
                                                    <img src="<?php echo e(url('public/images/site/loginBg.png')); ?>">
                                                    <button class="close">×</button>
                                                </div>
                                            </div>
                                            <div class="upload-area"></div>
                                            <h5><?php echo e(awtTrans('خلفيه صفحه تسجيل الدخول')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5"><?php echo e(awtTrans('حفظ')); ?></button>
                        </form>
                    </div>
                </div>
                <div id="about" class="tab-pane">
                    <div class="card-body">
                        <form class="form-horizontal gx-card" role="form" enctype="multipart/form-data" method="post" action="<?php echo e(route('sitesetting')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label class="control-label" for="example-email"><?php echo e(awtTrans('عن التطبيق')); ?> </label>
                                <div>
                                    <textarea name="about_ar" id="" required cols="30" rows="10" class="form-control"><?php echo e(settings('about_ar')); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="example-email"><?php echo e(awtTrans('عن التطبيق بالانجليزيه')); ?> </label>
                                <div>
                                    <textarea name="about_en" id="" required cols="30" rows="10" class="form-control"><?php echo e(settings('about_en')); ?></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5"><?php echo e(awtTrans('حفظ')); ?></button>
                        </form>
                    </div>
                </div>
                <div id="terms" class="tab-pane">
                    <div class="card-body">
                        <form class="form-horizontal gx-card" role="form" enctype="multipart/form-data" method="post" action="<?php echo e(route('sitesetting')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label class="control-label" for="example-email"> <?php echo e(awtTrans('الشروط والاحكام')); ?>  </label>
                                <div>
                                    <textarea name="terms_ar" id="" required cols="30" rows="10" class="form-control"><?php echo e(settings('terms_ar')); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="example-email"><?php echo e(awtTrans('الشروط والاحكام  بالانجليزيه')); ?> </label>
                                <div>
                                    <textarea name="terms_en" id="" required cols="30" rows="10" class="form-control"><?php echo e(settings('terms_en')); ?></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">حفظ</button>
                        </form>
                    </div>
                </div>
                <div id="sms" class="tab-pane">
                    <div class="card-body">
                        <form class="form-horizontal gx-card" role="form" enctype="multipart/form-data" method="post" action="<?php echo e(route('sitesetting')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label class="control-label" for="example-email"> <?php echo e(awtTrans('رقم الهاتف')); ?> </label>
                                <div>
                                    <textarea name="sms_number" id="" required cols="30" rows="10" class="form-control"><?php echo e(settings('sms_number')); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="example-email"><?php echo e(awtTrans('كلمه السر')); ?> </label>
                                <div>
                                    <textarea name="sms_password" id="" required cols="30" rows="10" class="form-control"><?php echo e(settings('sms_password')); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="example-email"><?php echo e(awtTrans('اسم المرسل')); ?> </label>
                                <div>
                                    <textarea name="sms_sender_name" id="" required cols="30" rows="10" class="form-control"><?php echo e(settings('sms_sender_name')); ?></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5"><?php echo e(awtTrans('حفظ')); ?></button>
                        </form>
                    </div>
                </div>
                <div id="social" class="tab-pane">
                    <div class="card-body">
                        <div class="row gx-card">
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="button" class="btn_button btn_primary" id="openSocialForm"><?php echo e(awtTrans('اضافة')); ?></button>
                                    <div class="col-md-12">
                                        <div class="panel panel-custom panel-border">
                                            <div class="panel-heading">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-striped m-0 table_social">
                                                                <thead>
                                                                <tr>
                                                                    <th><?php echo e(awtTrans('الشعار')); ?></th>
                                                                    <th><?php echo e(awtTrans('اسم الموقع')); ?></th>
                                                                    <th><?php echo e(awtTrans('الرابط')); ?></th>
                                                                    <th><?php echo e(awtTrans('التحكم')); ?></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr id="addSocial" class="hidden">
                                                                    <form action="<?php echo e(route('add-social')); ?>" method="post" enctype="multipart/form-data">
                                                                        <?php echo e(csrf_field()); ?>

                                                                        <td>
                                                                            <input required type="file" name="icon" class="form-control" style="width: 189px;margin: auto;padding-top: 12px;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" minlength="2" type="text" name="site_name" placeholder="Facebook" class="form-control" style="width: 189px;margin: auto;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" minlength="2" type="link" name="url" placeholder="www.facebook.com" class="form-control" style="width: 189px;margin: auto;">
                                                                        </td>
                                                                        <td>
                                                                            <div class="btn_setting">
                                                                                <button type="submit"><i class="fa fa-save"></i></button>
                                                                                <button type="button" id="cancel"><i class="fa fa-close"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </form>
                                                                </tr>
                                                                <tr id="editSocial" class="hidden">
                                                                    <form action="<?php echo e(route('update-social')); ?>" method="post" enctype="multipart/form-data">
                                                                        <?php echo e(csrf_field()); ?>

                                                                        <input type="hidden" name="id" value="">
                                                                        <td>
                                                                            <input  type="file" name="edit_icon" class="form-control" style="width: 189px;margin: auto;padding-top: 12px;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" value="" minlength="2" type="text" name="edit_name" placeholder="Facebook" class="form-control" style="width: 189px;margin: auto;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" value="" minlength="2" type="link" name="edit_url" placeholder="www.facebook.com" class="form-control" style="width: 189px;margin: auto;">
                                                                        </td>
                                                                        <td>
                                                                            <div class="btn_setting">
                                                                                <button type="submit"><i class="fa fa-save"></i></button>
                                                                                <button type="button" id="cancelEdit"><i class="fa fa-close"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </form>
                                                                </tr>
                                                                <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            <a target="_blank" href="<?php echo e($social->url); ?>" class="btn-<?php echo e($social->icon); ?> btn-small">
                                                                                <img src="<?php echo e(Request::root()); ?>/public/images/socials/<?php echo e($social->icon); ?>" alt="" style="height: 30px;width: 30px; border-radius: 50%;">
                                                                            </a>
                                                                        </th>
                                                                        <td><?php echo e($social->site_name); ?></td>
                                                                        <td><?php echo e($social->url); ?></td>
                                                                        <td>
                                                                            <div class="btn_setting">
                                                                                <button type="button" class="editSocialForm"
                                                                                        data-id     = "<?php echo e($social->id); ?>"
                                                                                        data-name   = "<?php echo e($social->site_name); ?>"
                                                                                        data-ics    = "<?php echo e($social->icon); ?>"
                                                                                        data-url    = "<?php echo e($social->url); ?>"><i class="fa fa-edit"></i></button>
                                                                                <a href="<?php echo e(route('delete-social', $social->id )); ?>"><i class="fa fa-trash"></i></a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script>
        $("#openSocialForm").on('click', function () {
            $(this).attr('disabled', 'disabled');
            $("#addSocial").removeClass('hidden');
        });

        $("#cancel").on('click', function () {
            $('#openSocialForm').removeAttr('disabled');
            $("#addSocial").addClass('hidden');
        });

        $(".editSocialForm").on('click', function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            // let icon = $(this).data('ics');
            let url = $(this).data('url');

            $("input[name='id']").val(id);
            $("input[name='edit_name']").val(name);
            // $("input[name='edit_icon']").val(icon);
            $("input[name='edit_url']").val(url);

            $("#editSocial").removeClass('hidden');
        });

        $("#cancelEdit").on('click', function () {
            $("#editSocial").addClass('hidden');
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmedtahaarabsde/public_html/dashboard_test/resources/views/dashboard/settings/index.blade.php ENDPATH**/ ?>