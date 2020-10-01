<div class="module-box-topbar">
    <div class="form-checkbox">
        <input type="checkbox" id="selectAll">
        <span class="check" style="top: 6px;"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
        <span><?php echo e(awtTrans('تحديد الكل')); ?></span>
    </div>

    <a href="javascript:void(0)" class="gx-btn btn-danger"id="deleteAll">
        <i class="fa fa-trash"></i> <span><?php echo e(awtTrans('حذف المحدد')); ?></span>
    </a>

</div>
<div class="module-list mail-list">
    <div class="custom-scrollbar module-list-scroll ps--active-y" id="messages">

        <form action="<?php echo e(route('delete_mail')); ?>" method="post" id="messages_form">
            <?php echo csrf_field(); ?>

            <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="module-list-item mail-cell block_massage <?php echo e(!$msg->seen ? 'active_massage' :''); ?>">
                    <div class="form-checkbox">
                        <input value="<?php echo e($msg->id); ?>" name="deleted_id[]" type="checkbox" class="message">
                        <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                    </div>
                    <div class="module-list-info  message_info" data-id="<?php echo e($msg->id); ?>">
                        <div class="module-list-content">
                            <div class="flex_space">
                                <span class="sender-name"><?php echo e($msg->name); ?></span>
                                <span class="subject"><?php echo e($msg->subject); ?></span>
                            </div>
                            <div class="message"><p> <?php echo e(str_limit($msg->message,200)); ?></p>
                                <div class="labels text-left">
                                    <span class="badge color_pink"><?php echo e($msg->created_at->diffForHumans()); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h4 class="not_found_text"><?php echo e(awtTrans('لا يوجد رسائل')); ?></h4>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/ahmedtahaarabsde/public_html/dashboard_test/resources/views/dashboard/shared/ajax/contact_us/messages.blade.php ENDPATH**/ ?>