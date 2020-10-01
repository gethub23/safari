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
                    <th><?php echo e(awtTrans('الاسم بالعربيه')); ?></th>
                    <th><?php echo e(awtTrans('الاسم بالانجليزيه')); ?></th>
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
                            <td><?php echo e($row->name_ar); ?></td>
                            <td><?php echo e($row->name_en); ?></td>
                            <td><?php echo e($row->created_at->diffForHumans()); ?></td>
                            <?php $__env->startComponent('dashboard.shared.components.editbutton', ['row' =>[
                                'id'           => $row->id ,
                                'name_ar'      => $row->name_ar ,
                                'name_en'      => $row->name_en ,
                                'category_id'  => $row->category_id ,
                            ]]); ?><?php echo $__env->renderComponent(); ?>
                            <?php $__env->startComponent('dashboard.shared.components.showbutton', ['row' =>[
                                'id'           => $row->id ,
                                'name_ar'      => $row->name_ar ,
                                'name_en'      => $row->name_en ,
                                'category_id'  => $row->category_id ,
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
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم بالعربيه')); ?></label>
                <input type="text" name="name_ar" id="" class="form-control" value="<?php echo e(old('name_ar')); ?>"  placeholder="<?php echo e(awtTrans('ادخل الاسم بالعربيه')); ?>" autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم بالانجليزيه')); ?></label>
                <input type="text" name="name_en" id="" class="form-control" value="<?php echo e(old('name_en')); ?>"  placeholder="<?php echo e(awtTrans('ادخل الاسم بالانجليزيه')); ?>" autocomplete="nope" required>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('القسم')); ?></label>
                    <select name="category_id" id="" required class="form-control">
                        <option value=> <?php echo e(awtTrans('اختر قسم _')); ?></option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == old('category_id') ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('dashboard.shared.components.editmodel'); ?>
        <?php $__env->slot('EditModelContent'); ?>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم بالعربيه')); ?></label>
                <input type="text" name="name_ar" id="name_ar" class="form-control" value="<?php echo e(old('name_ar')); ?>"  autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم بالانجليزيه')); ?></label>
                <input type="text" name="name_en" id="name_en" class="form-control" value="<?php echo e(old('name_en')); ?>"   autocomplete="nope" required>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('القسم')); ?></label>
                    <select name="category_id" id="category_id" required class="form-control">
                        <option value=> <?php echo e(awtTrans('اختر قسم _')); ?></option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('dashboard.shared.components.showmodel'); ?>
        <?php $__env->slot('ShowModelContent'); ?>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم بالعربيه')); ?></label>
                <input type="text" name="name_ar" id="" class="form-control name_ar" value="<?php echo e(old('name_ar')); ?>"  autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم بالانجليزيه')); ?></label>
                <input type="text" name="name_en" id="" class="form-control name_en" value="<?php echo e(old('name_en')); ?>"   autocomplete="nope" required>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('القسم')); ?></label>
                    <select class="form-control category_id">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
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

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\safari\resources\views/dashboard/subcategories/index.blade.php ENDPATH**/ ?>