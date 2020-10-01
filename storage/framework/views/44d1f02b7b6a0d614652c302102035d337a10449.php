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
                    <a class="nav-link" data-toggle="tab" href="#sms" role="tab"
                       aria-controls="profile" aria-selected="true"><?php echo e(awtTrans('بيانات باقه الرسائل')); ?>

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
                             <div class="form-group">
                                <label class="control-label" for="name_ar"><?php echo e(awtTrans('البريد الالكتروني')); ?></label>
                                <div>
                                    <input required type="text" id="example-email" value="<?php echo e(settings('email')); ?>" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="phone"><?php echo e(awtTrans('الهاتف')); ?> </label>
                                <div>
                                    <input required type="text" id="example-email" value="<?php echo e(settings('phone')); ?>" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="phone"><?php echo e(awtTrans('رقم واتس اب')); ?> </label>
                                <div>
                                    <input required type="text" id="example-email" value="<?php echo e(settings('wahtsapp')); ?>" name="whatsapp" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="facebook"><?php echo e(awtTrans('فيسبوك')); ?> </label>
                                <div>
                                    <input required type="text" id="example-email" value="<?php echo e(settings('facebook')); ?>" name="facebook" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="phone"><?php echo e(awtTrans('انستجرام')); ?> </label>
                                <div>
                                    <input required type="text" id="example-email" value="<?php echo e(settings('instagram')); ?>" name="instagram" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="facebook"><?php echo e(awtTrans('تويتر')); ?> </label>
                                <div>
                                    <input required type="text" id="example-email" value="<?php echo e(settings('twitter')); ?>" name="twitter" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="facebook"><?php echo e(awtTrans('العموله')); ?> </label>
                                <div>
                                    <input required type="text" id="example-email" value="<?php echo e(settings('commission')); ?>" name="commission" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="facebook"><?php echo e(awtTrans('اقصي حد من العموله')); ?> </label>
                                <div>
                                    <input required type="text" id="example-email" value="<?php echo e(settings('max_commission')); ?>" name="max_commission" class="form-control">
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

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/dashboard/settings/index.blade.php ENDPATH**/ ?>