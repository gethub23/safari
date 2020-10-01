<?php $__env->startSection('title'); ?><?php echo e(awtTrans($pluralName)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.reload'); ?> <?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('dashboard.shared.components.deleteall'); ?> <?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('dashboard.shared.components.addbutton'); ?> <?php echo $__env->renderComponent(); ?>
    </div>
    <div class="gx-card">
        <?php $__env->startComponent('dashboard.shared.components.table'); ?>
        <?php $__env->slot('tableHead'); ?>
            <th>
                <div class="form-checkbox">
                    <input type="checkbox" value="value1" name="name1" id="checkedAll">
                    <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                </div>
            </th>
            <th><?php echo e(awtTrans('الصورة')); ?> </th>
            <th><?php echo e(awtTrans('الاسم')); ?></th>
            <th><?php echo e(awtTrans('البريد')); ?></th>
            <th><?php echo e(awtTrans('رقم الهاتف')); ?></th>
            <th><?php echo e(awtTrans('الصلاحيه')); ?></th>
            <th><?php echo e(awtTrans('التاريخ')); ?></th>
            <th><?php echo e(awtTrans('تعديل')); ?> </th>
            <th><?php echo e(awtTrans('عرض')); ?> </th>
            <th><?php echo e(awtTrans('حذف')); ?> </th>
        <?php $__env->endSlot(); ?>

        <?php $__env->slot('tableBody'); ?>
            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="hide_on_delete_<?php echo e($row->id); ?>">
                    <td class="text-center">
                        <div class="form-checkbox">
                            <input type="checkbox" class="checkSingle" id="<?php echo e($row->id); ?>">
                            <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                        </div>
                    </td>
                    <td><img src="<?php echo e(appPath()); ?>/images/users/<?php echo e($row->avatar); ?>" alt="row-img" width="60px" title="Mat Helme" class="img-circle img-thumbnail img-responsive"></td>
                    <td><?php echo e($row->name); ?></td>
                    <td><?php echo e($row->email); ?></td>
                    <td><?php echo e($row->phone); ?></td>
                    <td><?php echo e($row->Role->role); ?></td>
                    <td><?php echo e($row->created_at->diffForHumans()); ?></td>
                    <?php $__env->startComponent('dashboard.shared.components.editbutton', ['row' =>[
                    'id'            => $row->id ,
                    'name'          => $row->name ,
                    'phone'         => $row->phone ,
                    'email'         => $row->email ,
                    'role'          => $row->Role->id ,
                    'avatar'        => $row->avatar ,
                    ]]); ?><?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('dashboard.shared.components.showbutton', ['row' =>[
                    'id'            => $row->id ,
                    'name'          => $row->name ,
                    'phone'         => $row->phone ,
                    'email'         => $row->email ,
                    'role'          => $row->Role->id ,
                    'avatar'        => $row->avatar ,
                    ]]); ?><?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('dashboard.shared.components.deletebutton', ['id' => $row->id]); ?> <?php echo $__env->renderComponent(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
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

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم')); ?></label>
                <input type="text" name="name" id="" class="form-control" value="<?php echo e(old('name')); ?>"  placeholder="<?php echo e(awtTrans('ادخل الاسم')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('رقم الهاتف')); ?></label>
                <input type="text" name="phone" id="" class="form-control" value="<?php echo e(old('phone')); ?>"  placeholder="<?php echo e(awtTrans('ادخل رقم الهاتف')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('البريد الالكتروني')); ?></label>
                <input type="email" name="email" id="" class="form-control" value="<?php echo e(old('email')); ?>"  placeholder="<?php echo e(awtTrans('ادخل البريد الالكتروني')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('كلمه السر')); ?></label>
                <input type="password" name="password" id="" class="form-control" autocomplete="nope" required>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('الصلاحيه')); ?></label>
                    <select name="role" id="" required class="form-control">
                        <option value=> <?php echo e(awtTrans('اختر صلاحيه_ _')); ?></option>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->id); ?>" <?php echo e($role->id == old('role') ? 'selected' : ''); ?>><?php echo e($role->role); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

        <div class="form-group col-sm-6 col-md-6 mw-100">
            <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم')); ?></label>
            <input type="text" name="name" id="name" class="form-control"   placeholder="<?php echo e(awtTrans('ادخل الاسم')); ?>" autocomplete="nope" required>
        </div>

        <div class="form-group col-sm-6 col-md-6 mw-100">
            <label for="field-1" class="control-label"> <?php echo e(awtTrans('رقم الهاتف')); ?></label>
            <input type="text" name="phone" id="phone" class="form-control"   placeholder="<?php echo e(awtTrans('ادخل رقم الهاتف')); ?>" autocomplete="nope" required>
        </div>

        <div class="form-group col-sm-6 col-md-6 mw-100">
            <label for="field-1" class="control-label"><?php echo e(awtTrans('البريد الالكتروني')); ?></label>
            <input type="email" name="email" id="email" class="form-control" placeholder="<?php echo e(awtTrans('ادخل البريد الالكتروني')); ?>" autocomplete="nope" required>
        </div>

        <div class="form-group col-sm-6 col-md-6 mw-100">
            <label for="field-1" class="control-label"><?php echo e(awtTrans('كلمه السر')); ?></label>
            <input type="password" name="password" id="" class="form-control" autocomplete="nope" >
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="field-3" class="control-label"><?php echo e(awtTrans('الصلاحيه')); ?></label>
                <select name="role" id="role" required class="form-control">
                    <option value=> <?php echo e(awtTrans('اختر صلاحيه_ _')); ?></option>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($role->id); ?>" <?php echo e($role->id == old('role') ? 'selected' : ''); ?>><?php echo e($role->role); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم')); ?></label>
                <input type="text" name="name" id="" class="form-control name"  autocomplete="nope" >
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('رقم الهاتف')); ?></label>
                <input type="text" name="phone" id="" class="form-control phone"   autocomplete="nope" >
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('البريد الالكتروني')); ?></label>
                <input type="email" name="email" id="" class="form-control email"  autocomplete="nope" >
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('الصلاحيه')); ?></label>
                    <select name="role" id=""  class="form-control role">
                        <option value=> <?php echo e(awtTrans('اختر صلاحيه_ _')); ?></option>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->id); ?>" <?php echo e($role->id == old('role') ? 'selected' : ''); ?>><?php echo e($role->role); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>


        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('dashboard.shared.components.deleteallmodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.deletemodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.scripts'); ?>  <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmedtahaarabsde/public_html/dashboard_test/resources/views/dashboard/admins/index.blade.php ENDPATH**/ ?>