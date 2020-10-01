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
                    <th><?php echo e(awtTrans('الصورة')); ?> </th>
                    <th><?php echo e(awtTrans('العنوان')); ?></th>
                    <th><?php echo e(awtTrans('الوصف')); ?></th>
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
                            <td><img src="<?php echo e(appPath()); ?>/images/intros/<?php echo e($row->image); ?>" alt="row-img" width="60px" title="Mat Helme" class="img-circle img-thumbnail img-responsive"></td>
                            <td><?php echo e($row->title); ?></td>
                            <td><?php echo e($row->description); ?></td>
                            <td><?php echo e($row->created_at->diffForHumans()); ?></td>
                            <?php $__env->startComponent('dashboard.shared.components.editbutton', ['row'     =>[
                                'id'               => $row->id ,
                                'title_ar'         => $row->title_ar ,
                                'title_en'         => $row->title_en ,
                                'description_ar'   => $row->description_ar ,
                                'description_en'   => $row->description_en ,
                                'image'            => $row->image ,
                            ]]); ?><?php echo $__env->renderComponent(); ?>
                            <?php $__env->startComponent('dashboard.shared.components.showbutton', ['row'     =>[
                                'id'               => $row->id ,
                                'title_ar'         => $row->title_ar ,
                                'title_en'         => $row->title_en ,
                                'description_ar'   => $row->description_ar ,
                                'description_en'   => $row->description_en ,
                                'image'            => $row->image ,
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
                            <input type="file" accept="image/*" class="image-uploader" name="image">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area"></div>
                        <h5> <?php echo e(awtTrans('الصوره')); ?></h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالعربيه')); ?></label>
                <input type="text" name="title_ar" id="" class="form-control" value="<?php echo e(old('title_ar')); ?>"  placeholder="<?php echo e(awtTrans('ادخل العنوان بالعربيه')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالانجليزيه ')); ?></label>
                <input type="text" name="title_en" id="" class="form-control" value="<?php echo e(old('title_en')); ?>"  placeholder="<?php echo e(awtTrans('ادخل العنوان بالانجليزيه')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الوصف بالعربيه ')); ?></label>
                <textarea name="description_ar"  class="form-control"  cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف بالعربيه ')); ?>"><?php echo e(old('description_ar')); ?></textarea>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الوصف بالانجليزيه ')); ?></label>
                <textarea name="description_en"  class="form-control"  cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف بالانجليزيه ')); ?>"><?php echo e(old('description_en')); ?></textarea>
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
                                <img src="" href="<?php echo e(url('public/images/intros/')); ?>" id="image">
                                <button class="close">×</button>
                            </div>
                        </div>
                        <div class="upload-area"></div>
                        <h5><?php echo e(awtTrans('الصوره الشخصيه')); ?></h5>
                    </div>
                </div>
            </div>

           <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالعربيه')); ?></label>
                <input type="text" name="title_ar" id="title_ar" class="form-control"   placeholder="<?php echo e(awtTrans('ادخل العنوان بالعربيه')); ?>"  required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالانجليزيه ')); ?></label>
                <input type="text" name="title_en" id="title_en" class="form-control"  placeholder="<?php echo e(awtTrans('ادخل العنوان بالانجليزيه')); ?>"  required>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الوصف بالعربيه ')); ?></label>
                <textarea name="description_ar" id="description_ar"  class="form-control"  cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف بالعربيه ')); ?>"></textarea>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الوصف بالانجليزيه ')); ?></label>
                <textarea name="description_en" id="description_en"  class="form-control"  cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف بالانجليزيه ')); ?>"></textarea>
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
                                <img src=""  href="<?php echo e(url('public/images/intros/')); ?>" class="image">
                            </div>
                        </div>
                        <div class="upload-area"></div>
                        <h5><?php echo e(awtTrans('الصوره')); ?></h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالعربيه')); ?></label>
                <input type="text" name="title_ar" id="" class="form-control title_ar"   placeholder="<?php echo e(awtTrans('ادخل العنوان بالعربيه')); ?>"  required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالانجليزيه ')); ?></label>
                <input type="text" name="title_en" id="" class="form-control title_en"  placeholder="<?php echo e(awtTrans('ادخل العنوان بالانجليزيه')); ?>"  required>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الوصف بالعربيه ')); ?></label>
                <textarea name="description_ar" id=""  class="form-control description_ar"  cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف بالعربيه ')); ?>"></textarea>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الوصف بالانجليزيه ')); ?></label>
                <textarea name="description_en" id=""  class="form-control description_en"  cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف بالانجليزيه ')); ?>"></textarea>
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.deleteallmodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.deletemodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.scripts'); ?>  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\safari\resources\views/dashboard/intros/index.blade.php ENDPATH**/ ?>