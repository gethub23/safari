<div class="chat-main-header header_user_name">
    <a id="gxChatModuleSideNav" href="javascript:void(0)"
       class="drawer-btn d-block action-btn action-btn d-lg-none mr-2">
        <i class="zmdi zmdi-comment-text zmdi-hc-lg"></i>
    </a>
    <div class="header_info width_100">
        <div class="" style="display: inline-block">
            <div class="chat-avatar-mode">
                <img src="<?php echo e(url('public/images/users/'.$client->avatar)); ?>" class="user-avatar">
            </div>
        </div>
        <div class="chat-contact-name"><?php echo e($client->name); ?></div>
    </div>
</div>
<div class="chat-list-scroll ps ps--active-y">
    <div class="chat-main-content chat_content chat_group" id="room<?php echo e($client->id); ?>">
        <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <?php if($msg->s_id== $client->id): ?>
                <div class="d-flex flex-nowrap chat-item">
                    <div class="bubble"><?php echo e($msg->message); ?></div>
                    <div class="time"><?php echo e($msg->created_at->format('h:i:s a')); ?></div>
                </div>

            <?php else: ?>
                <div class="d-flex flex-nowrap chat-item flex-row-reverse">
                    <div class="bubble"><?php echo e($msg->message); ?></div>
                    <div class="time"><?php echo e($msg->created_at->format('h:i:s a')); ?></div>
                </div>

            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="form_sent">
    <textarea class="chat-textarea" id="message_box" placeholder="<?php echo e(awtTrans('ادخل الرسالة')); ?>" data-id=<?php echo e($client->id); ?>></textarea>
    <a class="action-btn" href="javascript:void(0)" id="send_message" data-id=<?php echo e($client->id); ?>><i class="zmdi  zmdi-mail-send"></i></a>
</div>


<?php /**PATH /home/ahmedtahaarabsde/public_html/dashboard_test/resources/views/dashboard/shared/ajax/chat/chat.blade.php ENDPATH**/ ?>