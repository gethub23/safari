    <?php $__env->startSection('title'); ?>
        تسجيل دخول
    <?php $__env->stopSection(); ?>
        <?php $__env->startSection('content'); ?>
            <div class="block_login" style="background-image: url('http://ahmed-taha.arabsdesign.com/dashboard_test/public/images/site/loginBg.png');">
                <div class="overLay"></div>
                    <div class="login-content animated slideInUpTiny animation-duration-3">
                        <div class="login-header">
                            <a class="site-logo" href="javascript:void(0)" title="Jambo">
                                <img src="<?php echo e(url('public/images/site/logo.png')); ?>" alt="jambo" title="jambo">
                            </a>
                        </div>
                        <div class="login-form">
                            <form class="needs-validation" method="post" action="<?php echo e(route('login')); ?>" >
                                <?php echo e(csrf_field()); ?>

                                <fieldset>
                                    <div class="form_group">
                                        <input  type="email"  class="<?php echo e(session()->has('error_email') ? 'border-danger' : ''); ?>" name="email" id="email"  value="<?php echo e(old('email')); ?>"  placeholder="<?php echo e(trans('site.email')); ?>" required>
                                        <?php if(session()->has('error_email')): ?>
                                            <small class="form-text text-danger"> <?php echo e(awtTrans('تأكد من البريد الالكتروني')); ?></small>
                                        <?php endif; ?>

                                    </div>
                                    <div class="form_group">
                                        <input type="password" name="password" id="password" class=" <?php echo e(session()->has('error_password') ? 'border-danger' : ''); ?>" placeholder="<?php echo e(trans('site.password')); ?>" required>
                                        <?php if(session()->has('error_password')): ?>
                                            <small class="form-text  text-danger"> <?php echo e(awtTrans('تأكد من كلمه السر')); ?></small>
                                        <?php endif; ?>
                                    </div>
                                    <button type="submit" class="btn_button btn_primary"><?php echo e(awtTrans('تسجيل دخول')); ?></button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
        <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.loginapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dashbaai/public_html/resources/views/dashboard/login.blade.php ENDPATH**/ ?>