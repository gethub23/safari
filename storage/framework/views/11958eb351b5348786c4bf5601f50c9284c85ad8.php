
<?php $__env->startSection('title'); ?><?php echo e(awtTrans('الدعم الفني')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="gx-module chat-module">
        <div id="gxChatModuleSidebar" class="chat-sidenav" style="">
            <div class="chat-sidenav-main">
                <div class="chat-sidenav-header">
                    <div class="chat-user-hd">
                        <div class="chat-avatar mr-3">
                            <div class="chat-avatar-mode">
                                <img src="<?php echo e(url('public/images/users/'.Auth::user()->avatar)); ?>" class="user-avatar size-50" alt="">
                            </div>
                        </div>
                        <div class="module-user-info d-flex flex-column justify-content-center">
                            <div class="module-title">
                                <h5 class="mb-0"><?php echo e(Auth::user()->name); ?></h5>
                            </div>
                            <div class="module-user-detail">
                                <a href="javascript:void(0)" class="text-muted"><?php echo e(Auth::user()->email); ?></a>
                            </div>
                        </div>
                    </div>













                </div>

                <div class="chat-sidenav-content">
                    <div class="tab-content">
                        <div id="chatList" class="tab-pane active ps-custom-scrollbar ps" style="position: relative; height: 564.062px;">
                            <div class="chat-user" id="room_section">
                                <?php $__empty_1 = true; $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php ($client = $room->sender->type=='user' ? $room->sender : $room->receiver); ?>
                                <div class="chat-user-item room" data-room="<?php echo e($room->room); ?>" data-id="<?php echo e($client->id); ?>" data-unread="<?php echo e($room->room); ?>_unread" id="<?php echo e($room->room); ?>">
                                    <div class="chat_user">
                                        <div class="chat_avatar">
                                            <div class="chat_avatar_mode">
                                                <img src="<?php echo e(url('public/images/users/'.$client->avatar)); ?>" class="user_photo" alt="">
                                            </div>
                                        </div>
                                        <div class="chat_info">
                                            <div class="flex_space">
                                                <span class="name"><?php echo e($client->name); ?></span>
                                                <div class="last_message_time"><?php echo e($room->created_at->diffForHumans()); ?></div>
                                            </div>
                                            <div class="info_massage"><?php echo e(str_limit($room->message,25)); ?></div>
                                        </div>

                                        <?php if($room->unread!=0): ?>
                                            <div class="chat_date">
                                                <span class="badge_chat" id="<?php echo e($room->room); ?>_unread"><?php echo e($room->unread); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <h4 class="not_found_text"<?php echo e(awtTrans('لا يوجد رسائل')); ?>></h4>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="chat-module-box" >
            <div class="chat-box">
                <div class="chat-box-main">
                    <div class="chat-main" id="chat_messages" >
                        <div class="chat-list-scroll">
                            <div class="loader-view h-100">
                                <i class="zmdi zmdi-comment s-128 text-muted"></i>
                                <h1 class="text-muted"><?php echo e(awtTrans('اختار المستخدم لبدأ المحادثة')); ?></h1>
                                <a id="gxChatModuleSideNav"
                                   class="gx-btn gx-flat-btn gx-btn-primary drawer-btn d-block d-lg-none"
                                   href="javascript:void(0)">
                                    <?php echo e(awtTrans('اختار المستخدم لبدأ المحادثة')); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script type="text/javascript">


        $(document).on('click', '.room', function () {

            let ob          = $(this);
            let id          = ob.data('id');
            let room        = ob.data('room');
            let unread      = ob.data('unread');
            $.ajax({
                type: "get",
                url: "<?php echo e(route('get_chat')); ?>",
                data: {_token: "<?php echo e(csrf_token()); ?>", room: room, id : id},
                cache: false,
                success: function (data) {

                    $('#chat_messages').empty();
                    $('#chat_messages').append(data.messages);
                    $(".chat_content").animate({ scrollTop: $('.chat_content').prop("scrollHeight")}, 1000);

                    $('.room').removeClass('active');
                    ob.addClass('active');
                    $('#'+unread).remove();



                }
            });

        });

        //send message
        $(document).on('click', '#send_message', function () {

            let msg_box = $('#message_box');
            let msg = msg_box.val().trim();
            let id = $(this).data('id');

            if(msg !=='')
                sendMessage(msg_box,msg, id);

        });

        $(document).on('keypress', '#message_box', function (e) {

            let msg = $(this).val().trim();
            let id = $(this).data('id');

            if(msg !=='' &&  e.which == 13)
                sendMessage($(this),msg, id);

        });

        function sendMessage(msg_box, msg,id){

            $.ajax({
                type: "post",
                url: "<?php echo e(route('send_message')); ?>",
                data: {_token: "<?php echo e(csrf_token()); ?>", message: msg, id : id},
                cache: false,
                success: function (data) {

                    $('.chat_content').append(data.messages);
                    msg_box.val('');
                    $(".chat_content").animate({ scrollTop: $('.chat_content').prop("scrollHeight")}, 1000);

                    if(msg.length >25)
                        $('#room'+id+' .info_massage').html(msg.substring(25));
                    else
                        $('#room'+id+' .info_massage').html(msg);

                    $('#room'+id).prependTo( $('#room_section'));
                }
            });
        }

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmedtahaarabsde/public_html/dashboard_test/resources/views/dashboard/chat_support/index.blade.php ENDPATH**/ ?>