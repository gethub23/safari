
<?php $__env->startSection('title'); ?><?php echo e(awtTrans($pluralName)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.reload'); ?> <?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('dashboard.shared.components.deleteall'); ?> <?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('dashboard.shared.components.addbutton'); ?> <?php echo $__env->renderComponent(); ?>
    </div>
    <div class="gx-card Block_Up">
        <?php if($rows->count()): ?>
            <?php $__env->startComponent('dashboard.shared.components.table'); ?>
                <?php $__env->slot('tableHead'); ?>
                    <th>
                        <div class="form-checkbox">
                            <input type="checkbox" value="value1" name="name1" id="checkedAll">
                            <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                        </div>
                    </th>
                    <th><?php echo e(awtTrans('الصورة')); ?></th>
                    <th><?php echo e(awtTrans('العنوان')); ?></th>
                    <th><?php echo e(awtTrans('تاريخ الانتهاء')); ?></th>
                    <th> * </th>
                    <th><?php echo e(awtTrans('التاريخ')); ?></th>
                    <th><?php echo e(awtTrans('تعديل')); ?> </th>
                    <th><?php echo e(awtTrans('عرض')); ?> </th>
                    <th><?php echo e(awtTrans('حذف')); ?> </th>
                <?php $__env->endSlot(); ?>

                <?php $__env->slot('tableBody'); ?>
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="hide_on_delete_<?php echo e($row->id); ?>">
                            <td class="text-center">
                                <div class="form-checkbox">
                                    <input type="checkbox" class="checkSingle" id="<?php echo e($row->id); ?>">
                                    <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                                </div>
                            </td>
                            <td><img src="<?php echo e(imageUrl('banners',$row->image)); ?>" alt="row-img" width="60px" title="Mat Helme" class="img-circle img-thumbnail img-responsive"></td>
                            <td><?php echo e($row->title); ?></td>
                            <td><?php echo e(date('d-m-yy',strtotime($row->expire))); ?></td>
                            <?php if($row->active == 1): ?>
                                <td> <?php echo e(awtTrans('نشط')); ?> </td>
                            <?php else: ?>
                                <td><?php echo e(awtTrans('غير نشط')); ?></td>
                            <?php endif; ?>

                            <td><?php echo e($row->created_at->diffForHumans()); ?></td>
                            <?php $__env->startComponent('dashboard.shared.components.editbutton', ['row' =>[
                                'id'            => $row->id ,
                                'title'         => $row->title ,
                                'description'   => $row->description ,
                                'days'          => $row->days ,
                                'image'         => $row->image ,
                                'url'           => $row->url ,
                            ]]); ?><?php echo $__env->renderComponent(); ?>
                            <?php $__env->startComponent('dashboard.shared.components.showbutton', ['row' =>[
                                'id'            => $row->id ,
                                'title'         => $row->title ,
                                'description'   => $row->description ,
                                'days'          => $row->days ,
                                'image'         => $row->image ,
                                'url'           => $row->url ,
                            ]]); ?><?php echo $__env->renderComponent(); ?>
                            <?php $__env->startComponent('dashboard.shared.components.deletebutton', ['id' => $row->id]); ?> <?php echo $__env->renderComponent(); ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        <?php else: ?>
            <div class="Err_Block">
                <img  src="<?php echo e(url('public/design/admin/images/no_found.png')); ?>">
            </div>
        <?php endif; ?>
    </div>
    <?php $__env->startComponent('dashboard.shared.components.addmodel'); ?>
        <?php $__env->slot('AddModelContent'); ?>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <div class="text-center">
                    <div class="images-upload-block">
                        <label class="upload-img">
                            <input type="file" accept="image/*" class="image-uploader" name="image" required>
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area"></div>
                        <h5><?php echo e(awtTrans('صوره البانر')); ?></h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('العنوان')); ?></label>
                <input type="text" name="title" id="" class="form-control" value="<?php echo e(old('title')); ?>"  placeholder="<?php echo e(awtTrans('العنوان')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('المده بالايام')); ?></label>
                <input  name="days" type="number" class="form-control" value="<?php echo e(old('days')); ?>" required />
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الرابط')); ?> </label>
                <input type="url" name="url" id="" class="form-control" value="<?php echo e(old('url')); ?>" required />
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الوصف')); ?></label>
                <textarea name="description" id="" class="form-control" cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف')); ?>" required><?php echo e(old('description')); ?></textarea>
            </div>


        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('dashboard.shared.components.editmodel'); ?>
        <?php $__env->slot('EditModelContent'); ?>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <div class="text-center">
                    <div class="images-upload-block">
                        <label class="upload-img">
                            <input type="file" accept="image/*" class="image-uploader" name="image" >
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area">
                            <div class="uploaded-block" data-count-order="0">
                                <img src="" href="<?php echo e(url('public/images/banners/')); ?>" id="image">
                                <button class="close">×</button>
                            </div>
                        </div>
                        <div class="upload-area"></div>
                        <h5><?php echo e(awtTrans('الصوره الشخصيه')); ?></h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('العنوان')); ?></label>
                <input type="text" name="title" id="title" class="form-control"   placeholder="<?php echo e(awtTrans('العنوان')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('المده بالايام')); ?> </label>
                <input name="days" type="number" id="days" class="form-control" required />
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الرابط')); ?> </label>
                <input name="url" id="url"  type="url" class="form-control" required />
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الوصف')); ?></label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف')); ?>" required><?php echo e(old('description')); ?></textarea>
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('dashboard.shared.components.showmodel'); ?>
         <?php $__env->slot('ShowModelContent'); ?>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <div class="text-center">
                    <div class="images-upload-block">
                        <label class="upload-img">
                            <input type="file" accept="image/*" class="image-uploader" name="image" >
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area">
                            <div class="uploaded-block" data-count-order="0">
                                <img src=""  href="<?php echo e(url('public/images/banners/')); ?>" class="image">
                            </div>
                        </div>
                        <div class="upload-area"></div>
                        <h5><?php echo e(awtTrans('الصوره الشخصيه')); ?></h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('العنوان')); ?></label>
                <input type="text" name="title" id="" class="form-control title" placeholder="<?php echo e(awtTrans('العنوان')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('المده بالايام')); ?></label>
                <input  name="days" type="number" id="" class="form-control days" required />
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الرابط')); ?> </label>
                <input type="url" name="link" id="" class="form-control url" required />
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الوصف')); ?></label>
                <textarea name="description" id="" class="form-control description" cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف')); ?>" required><?php echo e(old('description')); ?></textarea>
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('dashboard.shared.components.deleteallmodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.deletemodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.scripts'); ?>  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dashbaai/public_html/resources/views/dashboard/banners/index.blade.php ENDPATH**/ ?>