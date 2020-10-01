<!-- Main Header -->
<header class="main-header">
    <div class="gx-toolbar">
        <div class="sidebar-mobile-menu d-block d-lg-none">
            <a class="gx-menu-icon menu-toggle" href="#menu">
                <span class="menu-icon"></span>
            </a>
        </div>

        <!-- Sidebar header  -->
        <div class="sidebar-header">
            <div class="user-profile">
                <img class="user-avatar img_border" alt="Domnic" src="<?php echo e(appPath()); ?>/images/users/<?php echo e(auth()->user()->avatar); ?>">

                <div class="user-detail">
                    <h4 class="user-name">
                        <span class="dropdown">
                            <a class="dropdown-toggle user_enter" href="#" role="button" id="userAccount"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <?php echo e(auth()->user()->name); ?>

                            </a>

                            <span class="dropdown-menu dropdown-menu-right drop_down" aria-labelledby="userAccount">
                                <a class="dropdown-item" href="<?php echo e(route('settings')); ?>">
                                    <i class="zmdi zmdi-settings zmdi-hc-fw mr-2"></i>
                                    <?php echo e(awtTrans('الاعدادات')); ?>

                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">
                                    <i class="zmdi zmdi-sign-in zmdi-hc-fw mr-2"></i>
                                    <?php echo e(awtTrans('تسجيل خروج')); ?>

                                </a>
                            </span>
                        </span>
                    </h4>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->


        <ul class="quick-menu header-notifications ml-auto">

            <li class="nav-searchbox dropdown d-inline-block ">
                <?php if(app()->getLocale() == 'en'): ?>
                    <a href="<?php echo e(url('admin/lang/ar')); ?>"> <i class="zmdi zmdi-globe-alt zmdi-hc-fw"></i> العربية </a>
                <?php else: ?>
                    <a href="<?php echo e(url('admin/lang/en')); ?>"> <i class="zmdi zmdi-globe-alt zmdi-hc-fw"></i> EN </a>
                <?php endif; ?>
            </li>
            <?php ($mails = \App\Models\ContactUs::where('seen',0)->get()); ?>

            <li class="dropdown">
                <a href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" class="d-inline-block" aria-expanded="true">
                    <i class="zmdi zmdi-comment-alt-text <?php echo e(count($mails) ? 'icons-alert' :''); ?> zmdi-hc-fw"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" data-placement="bottom-end" data-x-out-of-boundaries="">
                    <div class="gx-card-header d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="card-heading"><?php echo e(awtTrans('الرسائل')); ?></h3>
                        </div>
                    </div>

                    <div class="dropdown-menu-perfectscrollbar1 d-flex a justify-content-center">

                        <?php if(count($mails)): ?>

                            <div class="messages-list">
                                <ul class="list-unstyled">
                                    <?php $__currentLoopData = $mails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="media">
                                            <div class="user-thumb">
                                                <img  src="<?php echo e(url('public/images/default.png')); ?>" class="rounded-circle size-40 user-avatar">
                                            </div>

                                            <div class="media-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="text-capitalize user-name mb-0">
                                                        <a href="<?php echo e(route('contact_us')); ?>"><?php echo e($mail->name); ?></a>
                                                    </h5>
                                                    <a href="<?php echo e(route('contact_us')); ?>" class="meta-date"><small><?php echo e($mail->created_at->format('h:i:s a')); ?></small></a>
                                                </div>
                                                <p class="sub-heading"><?php echo e(str_limit($mail->message,40)); ?>...</p>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php else: ?>
                            <?php echo e(awtTrans('لا يوجد اشعارات')); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- /main header -->
<?php /**PATH C:\xampp\htdocs\app\resources\views/dashboard/layouts/headerNav.blade.php ENDPATH**/ ?>