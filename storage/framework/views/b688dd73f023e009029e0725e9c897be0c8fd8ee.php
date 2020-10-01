<?php if($message): ?>
    <div class="back_click">
        <a href="javascript:void(0)" id="back_to_inbox"><i class="zmdi zmdi-arrow-back zmdi-hc-2x"></i></a>
    </div>
    <div class="module-box-column">
        <div class="module-detail mail-detail block_email">
            <div class="module-list-scroll custom-scrollbar ps" style="position: relative; height: 621.055px;">
                <div class="mail-header">
                    <div class="flex_space width_100">
                        <div class="subject"><?php echo e($message->subject); ?></div>
                        <div class="labels">
                            <span class="badge text-white bg-green darken-1"><?php echo e($message->created_at->format('Y-m-d h:i:s a')); ?></span>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="mail-user-info width_100">
                    <img class="img_senter" alt="Alice Freeman" src="<?php echo e(url('public/images/default.png')); ?>">
                    <div class="sender-name width_100">
                        <h4 class="send-to text-grey"><?php echo e($message->name); ?></h4>
                        <div class="flex_space width_100">
                            <p class="send-to text-grey"><?php echo e($message->email); ?></p>
                            <strong class="send-to text-grey"><?php echo e($message->phone); ?></strong>
                        </div>
                    </div>

                </div><br>

                <p class="message text-center"><?php echo e($message->message); ?></p>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <h4 class="not_found_text"><?php echo e(awtTrans('لا يوجد رسائل')); ?></h4>
<?php endif; ?>
<?php /**PATH /home/ahmedtahaarabsde/public_html/dashboard_test/resources/views/dashboard/shared/ajax/contact_us/message_info.blade.php ENDPATH**/ ?>