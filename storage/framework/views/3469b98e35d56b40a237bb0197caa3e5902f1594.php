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
                    <th><?php echo e(awtTrans('الاسم')); ?></th>
                    <th><?php echo e(awtTrans('رقم الهاتف')); ?></th>
                    <th><?php echo e(awtTrans('الحالة')); ?></th>
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
                        <td><img src="<?php echo e(imageUrl('users',$row->avatar)); ?>" alt="row-img" width="60px" title="Mat Helme" class="img-circle img-thumbnail img-responsive"></td>
                        <td><?php echo e($row->name); ?></td>
                        <td><?php echo e($row->phone); ?></td>
                        <td>
                            <?php if($row->active == 0): ?>
                                <span class="label label-danger"><?php echo e(awtTrans('غير متصل')); ?></span>
                            <?php else: ?>
                                <span class="label label-success"><?php echo e(awtTrans('متصل')); ?></span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($row->created_at->diffForHumans()); ?></td>
                        <?php $__env->startComponent('dashboard.shared.components.editbutton', ['row' =>[
                            'id'            => $row->id ,
                            'name'          => $row->name ,
                            'phone'         => $row->phone ,
                            'avatar'        => $row->avatar ,
                            'active'        => $row->active ,
                        ]]); ?>   <?php echo $__env->renderComponent(); ?>
                        <?php $__env->startComponent('dashboard.shared.components.showbutton', ['row' =>[
                            'id'            => $row->id ,
                            'name'          => $row->name ,
                            'phone'         => $row->phone ,
                            'avatar'        => $row->avatar ,
                            'active'        => $row->active ,
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
                            <input type="file" accept="image/*" class="image-uploader" name="avatar">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area"></div>
                        <h5> <?php echo e(awtTrans('الصوره الشخصيه')); ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-1" class="control-label"><?php echo e(awtTrans('الاسم')); ?></label>
                    <input type="text" autocomplete="nope" name="name" required class="form-control" placeholder="<?php echo e(awtTrans('اوامر الشبكة')); ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-2" class="control-label"><?php echo e(awtTrans('رقم الهاتف')); ?></label>
                    <input type="number" autocomplete="nope" name="phone" required class="form-control " placeholder="05011000000">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('كلمة السر')); ?></label>
                    <input type="password" autocomplete="nope" name="password" required class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('الحاله')); ?></label>
                    <select name="active" required class="form-control">
                            <option value><?php echo e(awtTrans('اختر الحاله')); ?> </option>
                            <option value ='1'><?php echo e(awtTrans('متصل')); ?> </option>
                            <option value ='0'><?php echo e(awtTrans('غير متصل')); ?> </option>
                    </select>
                </div>
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('dashboard.shared.components.editmodel'); ?>
       <?php $__env->slot('EditModelContent'); ?>
           <div class="form-group col-sm-12 col-md-12 mw-100">
               <div class="text-center">
                   <div class="images-upload-block">
                       <label class="upload-img">
                           <input type="file" accept="image/*" class="image-uploader" name="avatar" >
                           <i class="fa fa-camera" aria-hidden="true"></i>
                       </label>
                       <div class="upload-area">
                           <div class="uploaded-block" data-count-order="0">
                               <img src="" href="<?php echo e(url('public/images/users/')); ?>" id="avatar">
                               <button class="close">×</button>
                           </div>
                       </div>
                       <div class="upload-area"></div>
                       <h5><?php echo e(awtTrans('الصوره الشخصيه')); ?></h5>
                   </div>
               </div>
           </div>

           <div class="col-md-6">
                <div class="form-group">
                    <label for="field-1" class="control-label"><?php echo e(awtTrans('الاسم')); ?></label>
                    <input type="text" autocomplete="nope" name="name" id="name" required class="form-control" placeholder="<?php echo e(awtTrans('اوامر الشبكة')); ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-2" class="control-label"><?php echo e(awtTrans('رقم الهاتف')); ?></label>
                    <input type="number" autocomplete="nope" name="phone" id="phone" required class="form-control " placeholder="05011000000">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('كلمة السر')); ?></label>
                    <input type="password" autocomplete="nope" name="password" required class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('الحاله')); ?></label>
                    <select name="active" id="active" required class="form-control">
                            <option value><?php echo e(awtTrans('اختر الحاله')); ?> </option>
                            <option value ='1'><?php echo e(awtTrans('متصل')); ?> </option>
                            <option value ='0'><?php echo e(awtTrans('غير متصل')); ?> </option>
                    </select>
                </div>
            </div>
       <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.showmodel'); ?>
        <?php $__env->slot('ShowModelContent'); ?>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <div class="text-center">
                    <div class="images-upload-block">
                        <label class="upload-img">
                            <input type="file" accept="image/*" class="image-uploader" name="avatar" >
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area">
                            <div class="uploaded-block" data-count-order="0">
                                <img src=""  href="<?php echo e(url('public/images/users/')); ?>" class="avatar">
                            </div>
                        </div>
                        <div class="upload-area"></div>
                        <h5><?php echo e(awtTrans('الصوره الشخصيه ')); ?></h5>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-1" class="control-label"><?php echo e(awtTrans('الاسم')); ?></label>
                    <input type="text" autocomplete="nope" name="name" id="" required class="form-control name" placeholder="<?php echo e(awtTrans('اوامر الشبكة')); ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-2" class="control-label"><?php echo e(awtTrans('رقم الهاتف')); ?></label>
                    <input type="number" autocomplete="nope" name="phone" id="" required class="form-control phone" placeholder="05011000000">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('كلمة السر')); ?></label>
                    <input type="password" autocomplete="nope" name="" required class="form-control password">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('الحاله')); ?></label>
                    <select name="active" id="" required class="form-control active">
                            <option value><?php echo e(awtTrans('اختر الحاله')); ?> </option>
                            <option value ='1'><?php echo e(awtTrans('متصل')); ?> </option>
                            <option value ='0'><?php echo e(awtTrans('غير متصل')); ?> </option>
                    </select>
                </div>
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.deleteallmodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.deletemodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.scripts'); ?> <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\safari\resources\views/dashboard/providers/index.blade.php ENDPATH**/ ?>