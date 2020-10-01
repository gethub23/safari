<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
    <?php echo e(awtTrans('الرسائل')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="gx-module">
        <div id="gxModuleSidebar" class="gx-module-sidenav">
            <div class="module-side">
                <div class="module-side-content">
                    <div class="module-side-scroll custom-side-scrollbar ps">
                        <div class="module-add-task">
                            <button class="btn gx-btn-shadow btn-block btn-primary text-uppercase add_massage flex_space" data-toggle="modal" data-target="#composeModal">
                                <span><?php echo e(awtTrans('ارسال رسالة')); ?></span>
                                <i class="zmdi zmdi-edit zmdi-hc-fw"></i>
                            </button>
                        </div>
                        <ul class="module-nav">
                            <li>
                                <a href="javascript:void(0)" class="active message_type" data-type="all">
                                    <i class="zmdi zmdi-inbox"></i>
                                    <span><?php echo e(awtTrans('كل الرسائل')); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="message_type" data-type="seen">
                                    <i class="zmdi zmdi-mail-send"></i>
                                    <span><?php echo e(awtTrans('المقروؤة')); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="message_type" data-type="unseen">
                                    <i class="zmdi zmdi-email-open "></i>
                                    <span><?php echo e(awtTrans('الغير مقروؤة')); ?></span>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <div class="module-box-content" id="msg_content">
            <div class="module-box-topbar">
                <div class="form-checkbox">
                    <input type="checkbox" id="selectAll">
                    <span class="check" style="top: 6px;"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                    <span><?php echo e(awtTrans('تحديد الكل')); ?></span>
                </div>

                <a href="javascript:void(0)" class="gx-btn btn-danger" id="deleteAll">
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
                                <div class="module-list-info message_info" data-id="<?php echo e($msg->id); ?>">
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h4 class="not_found_text"><?php echo e(awtTrans('لا يوجد رسائل')); ?></h4>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="composeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-box" role="document">
            <div class="modal-content">
                <div class="modal-box-header bg-primary modal-header">
                    <h4 class="flex_space width_100 color_light">
                        <?php echo e(awtTrans('إرسال رسالة')); ?>

                        <a href="javascript:void(0)" class="action-btn text-white" data-dismiss="modal" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </h4>
                </div>

                <form action="<?php echo e(route('send_mail')); ?>" method="post">
                    <div class="modal-box-content d-flex flex-column">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="<?php echo e(awtTrans('البريد الالكتروني')); ?>" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="<?php echo e(awtTrans('عنوان الرساله')); ?>" required>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="3" placeholder="<?php echo e(awtTrans('الرسالة')); ?>" required></textarea>
                            </div>
                    </div>
                    <div class="modal-box-footer">
                        <button type="submit" class="btn_button btn_primary" href="javascript:void(0)">
                            <span><?php echo e(awtTrans('إرسال')); ?></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script type="text/javascript">

        let type;

        $(document).on('change', '#selectAll', function () {

            if (this.checked) {
                $('.message').each(function () {
                    this.checked = true
                })
            } else {
                $('.message').each(function () {
                    this.checked = false;
                })
            }
        });

        //get messages
        $(document).on('click', '.message_type', function () {

            let msg = $(this);
            type = $(this).data('type');

            $.ajax({
                type: "get",
                url: "<?php echo e(route('get_mail')); ?>",
                data: {_token: "<?php echo e(csrf_token()); ?>", type: type},
                cache: false,
                success: function (data) {

                    $('#msg_content').empty();
                    $('#msg_content').append(data.messages);

                    $('.message_type').removeClass('active');
                    msg.addClass('active');

                }
            });
        });

        //get message info
        $(document).on('click', '.message_info', function () {

            let id = $(this).data('id');

            $.ajax({
                type: "get",
                url: "<?php echo e(route('mail_info')); ?>",
                data: {_token: "<?php echo e(csrf_token()); ?>", id: id},
                cache: false,
                success: function (data) {

                    console.log(data);
                    $('#msg_content').empty();
                    $('#msg_content').append(data.message);

                }
            });
        });

        //get messages
        $(document).on('click', '#back_to_inbox', function () {

            let msg = $(this);

            $.ajax({
                type: "get",
                url: "<?php echo e(route('get_mail')); ?>",
                data: {_token: "<?php echo e(csrf_token()); ?>", type: type},
                cache: false,
                success: function (data) {

                    $('#msg_content').empty();
                    $('#msg_content').append(data.messages);


                }
            });
        });

        //delete messages
        $(document).on('click', '#deleteAll', function () {

            var id = [];
            $.each($("input[name='deleted_id[]']:checked"), function () {
                id.push($(this).val());
            });

            if (id.length > 0)
                $('#messages_form').submit();

        });

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\safari\resources\views/dashboard/contact_us/index.blade.php ENDPATH**/ ?>