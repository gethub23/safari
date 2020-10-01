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
                    <th><?php echo e(awtTrans('صاحب الخدمه')); ?></th>
                    <th><?php echo e(awtTrans('العنوان')); ?></th>
                    <th><?php echo e(awtTrans('السعر')); ?></th>
                    <th> * </th>
                    <th><?php echo e(awtTrans('التاريخ')); ?></th>
                    <th><?php echo e(awtTrans('تعديل الاضافات')); ?> </th>
                    <th><?php echo e(awtTrans('اضافه الاضافات')); ?> </th>
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
                            <td><img src="<?php echo e(appPath()); ?>/images/services/<?php echo e($row->images->first()->image); ?>" alt="row-img" width="60px" class="img-circle img-thumbnail img-responsive"></td>
                            <td><?php echo e($row->user->name); ?></td>
                            <td><?php echo e($row->name); ?></td>
                            <td><?php echo e($row->price); ?></td>
                            <td>
                               <?php if($row->accepted == 0): ?>
                                     غير مفعل
                                    <hr>
                                    <button class="active" id="<?php echo e($row->id); ?>" style="background: #f44336;padding: 2px;margin: 2px;border-radius: 2px;color: white;"> تفعيل</button>
                                <?php else: ?>
                                    مفعل
                                    <hr>
                                    <button class="active" id="<?php echo e($row->id); ?>" style="background: #f44336;padding: 2px;margin: 2px;border-radius: 2px;color: white;">الغاء تفعيل</button>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($row->created_at->diffForHumans()); ?></td>
                            <td class="text-center">
                                <?php if($row->additions->count() > 0): ?>
                                    <i  data-toggle="modal" data-target="#2222" data-id="<?php echo e($row->id); ?>" class="edit_additions_button zmdi zmdi-edit zmdi-hc-fw zmdi-hc-lg text-primary"></i>
                                <?php else: ?>
                                     <?php echo e(awtTrans('لا يوجد')); ?>    
                                <?php endif; ?>
                                
                            </td>
                            <td class="text-center">
                                    <i  data-toggle="modal" data-target="#3333" data-id="<?php echo e($row->id); ?>" class="add_additions_button zmdi zmdi-plus zmdi-hc-fw zmdi-hc-lg text-primary"></i>
                            </td>
                            <?php $__env->startComponent('dashboard.shared.components.editbutton', ['row'   =>[
                                'id'             => $row->id ,
                                'name_en'        => $row->name_en ,
                                'name_ar'        => $row->name_ar ,
                                'description_ar' => $row->description_ar ,
                                'description_en' => $row->description_en ,
                                'price'          => $row->price ,
                                'user_id'        => $row->user_id ,
                                'latitude'       => $row->latitude ,
                                'longitude'      => $row->longitude ,
                                'whatsapp'       => $row->whatsapp  ,
                                'category_id'    => $row->category_id  ,
                                'sub_category_id'=> $row->sub_category_id  ,
                            ]]); ?><?php echo $__env->renderComponent(); ?>
                            <?php $__env->startComponent('dashboard.shared.components.showbutton', ['row'   =>[
                                'id'             => $row->id ,
                                'name_en'        => $row->name_en ,
                                'name_ar'        => $row->name_ar ,
                                'description_ar' => $row->description_ar ,
                                'description_en' => $row->description_en ,
                                'price'          => $row->price ,
                                'user_id'        => $row->user_id ,
                                'latitude'       => $row->latitude ,
                                'longitude'      => $row->longitude ,
                                'whatsapp'       => $row->whatsapp  ,
                                'category_id'    => $row->category_id  ,
                                'sub_category_id'=> $row->sub_category_id  ,

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

    <div class="modal fade" id="2222" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h2 class="modal-title" id="exampleModalCenterTitle"> <?php echo e(awtTrans('الاضافات')); ?></h2>
                </div>
                <div class="modal-body">
                    <form id="show_form">
                        <div class="container">
                            <div class="row">
                                <div id="additions">
                                    <div class="additions-head">
                                        <p>اضافات</p>
                                    </div>
                                    <div class="additions-body additions-body-edit">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <hr>
                            <a href="javascript:void(0)" class="btn text-secondary card-link" data-dismiss="modal"><?php echo e(awtTrans('اغلاق')); ?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="3333" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h2 class="modal-title" id="exampleModalCenterTitle"> <?php echo e(awtTrans('الاضافات')); ?></h2>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(url('admin/addAdditions')); ?>" enctype="multipart/form-data" method="POST">
                          <?php echo csrf_field(); ?>
                          <input type="text" name="service_id" id="service_id" hidden>
                        <div class="container">
                            <div class="row">
                               <div id="additions">
                                    <div class="additions-head">
                                        <p>اضافات</p>
                                        <span  class="add_additin">  <i class="fa fa-plus" aria-hidden="true"></i> </span>
                                    </div>
                                    <div class="additions-body">
                                        <div class="additions-collection">
                                            <input type="text" class="form-control" name="addition_ar[]" placeholder="<?php echo e(awtTrans('اسم الاضافه بالعربيه')); ?>" required>
                                            <input type="text" class="form-control" name="addition_en[]" placeholder="<?php echo e(awtTrans('اسم الاضافه بالانجليزيه')); ?>" required>
                                            <input type="file" class="form-control" name="addition_images[]" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <hr>
                            <button type="submit" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5"><?php echo e(awtTrans('اضافه')); ?></button>
                            <a href="javascript:void(0)" class="btn text-secondary card-link" data-dismiss="modal"><?php echo e(awtTrans('اغلاق')); ?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startComponent('dashboard.shared.components.addmodel'); ?>
        <?php $__env->slot('AddModelContent'); ?>
            <div class="form-group col-sm-12 col-md-12 mw-100 multi_img">
                <div class="text-center">
                    <div class="images-upload-block">
                        <label class="upload-img">
                            <input type="file" accept="image/*" class="image-uploader" name="images[]" multiple >
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area"></div>
                        <h5><?php echo e(awtTrans('صور الاعلان')); ?></h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم بالعربيه')); ?></label>
                <input type="text" name="name_ar" id="" class="form-control" value="<?php echo e(old('name_ar')); ?>"  placeholder="<?php echo e(awtTrans('ادخل الاسم بالعربيه')); ?>" autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم بالانجليزيه')); ?></label>
                <input type="text" name="name_en" id="" class="form-control" value="<?php echo e(old('name_en')); ?>"  placeholder="<?php echo e(awtTrans('ادخل الاسم بالانجليزيه')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('السعر')); ?></label>
                <input type="number" name="price" id="" class="form-control" value="<?php echo e(old('price')); ?>"  placeholder="<?php echo e(awtTrans('ادخل السعر')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('رقم الواتس اب')); ?></label>
                <input type="number" name="whatsapp" id="" class="form-control" value="<?php echo e(old('whatsapp')); ?>"  placeholder="<?php echo e(awtTrans('ادخل رقم الواتس')); ?>" autocomplete="nope" required>
            </div>

             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('صاحب الاعلان')); ?></label>
                    <select name="category_id" id="" required class="form-control" required>
                        <option value=> <?php echo e(awtTrans('اختر القسم')); ?></option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" ><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('صاحب الاعلان')); ?></label>
                    <select name="sub_category_id" id="" required class="form-control" required>
                        <option value=> <?php echo e(awtTrans('اختر القسم الفرعي')); ?></option>
                        <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subCategory->id); ?>" ><?php echo e($subCategory->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('صاحب الاعلان')); ?></label>
                    <select name="user_id" id="" required class="form-control" required>
                        <option value=> <?php echo e(awtTrans('اختر المستخدم')); ?></option>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>" ><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالعربيه')); ?></label>
                <textarea name="description_ar" class="form-control" cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف بالعربيه')); ?>" required><?php echo e(old('description_ar')); ?></textarea>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالعربيه')); ?></label>
                <textarea name="description_en" class="form-control" cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف بالعربيه')); ?>" required><?php echo e(old('description_en')); ?></textarea>
            </div>

            <div id="additions">
                <div class="additions-head">
                    <p>اضافات</p>
                    <span  class="add_additin">  <i class="fa fa-plus" aria-hidden="true"></i> </span>
                </div>
                <div class="additions-body">
                    <div class="additions-collection">
                        <input type="text" class="form-control" name="addition_ar[]" placeholder="<?php echo e(awtTrans('اسم الاضافه بالعربيه')); ?>" required>
                        <input type="text" class="form-control" name="addition_en[]" placeholder="<?php echo e(awtTrans('اسم الاضافه بالانجليزيه')); ?>" required>
                        <input type="file" class="form-control" name="addition_images[]" required> 
                        <button class="remove-addition"><i class="fa fa-close" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>

             <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('تحديد الموقع')); ?></label>
                 <div id="map" style="height: 400px; margin-top: 20px"></div>
                <input type="hidden" id="latitude" name="latitude" value="">
                <input type="hidden" id="longitude" name="longitude" value="">
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('dashboard.shared.components.editmodel'); ?>
        <?php $__env->slot('EditModelContent'); ?>
             <div class="form-group col-sm-12 col-md-12 mw-100 multi_img">
                <div class="text-center">
                    <div class="images-upload-block">
                        <label class="upload-img">
                            <input type="file" accept="image/*" class="image-uploader" name="images[]" multiple >
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area images_div">

                        </div>
                        <h5><?php echo e(awtTrans('صور الاعلان')); ?></h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم بالعربيه')); ?></label>
                <input type="text" name="name_ar" id="name_ar" class="form-control"  placeholder="<?php echo e(awtTrans('ادخل الاسم بالعربيه')); ?>"  required>
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم بالانجليزيه')); ?></label>
                <input type="text" name="name_en" id="name_en" class="form-control" placeholder="<?php echo e(awtTrans('ادخل الاسم بالانجليزيه')); ?>"  required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('السعر')); ?></label>
                <input type="number" name="price" id="price" class="form-control"  placeholder="<?php echo e(awtTrans('ادخل السعر')); ?>"  required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('رقم الواتس اب')); ?></label>
                <input type="number" name="whatsapp" id="whatsapp" class="form-control"  placeholder="<?php echo e(awtTrans('ادخل رقم الواتس اب')); ?>"  required>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('صاحب الاعلان')); ?></label>
                    <select name="category_id" id="category_id" required class="form-control" required>
                        <option value=> <?php echo e(awtTrans('اختر القسم')); ?></option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" ><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('صاحب الاعلان')); ?></label>
                    <select name="sub_category_id" id="sub_category_id" required class="form-control" required>
                        <option value=> <?php echo e(awtTrans('اختر القسم الفرعي')); ?></option>
                        <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subCategory->id); ?>" ><?php echo e($subCategory->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('صاحب الاعلان')); ?></label>
                    <select name="user_id" id="user_id"  class="form-control" required>
                        <option value=> <?php echo e(awtTrans('اختر المستخدم')); ?></option>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>" ><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالعربيه')); ?></label>
                <textarea name="description_ar" id="description_ar" class="form-control" cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف بالعربيه')); ?>" required><?php echo e(old('description_ar')); ?></textarea>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالعربيه')); ?></label>
                <textarea name="description_en" id="description_en" class="form-control" cols="30" rows="10" placeholder="<?php echo e(awtTrans('ادخل الوصف بالعربيه')); ?>" required><?php echo e(old('description_en')); ?></textarea>
            </div>

             <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('تحديد الموقع')); ?></label>
                 <div id="edit_map" style="height: 400px; margin-top: 20px"></div>
                <input type="hidden" id="latitude2" name="latitude" value="">
                <input type="hidden" id="longitude2" name="longitude" value="">
            </div>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('dashboard.shared.components.showmodel'); ?>
        <?php $__env->slot('ShowModelContent'); ?>
           <div class="form-group col-sm-12 col-md-12 mw-100 multi_img">
                <div class="text-center">
                    <div class="images-upload-block">
                        <div class="upload-area images_div"> </div>
                        <h5><?php echo e(awtTrans('صور الاعلان')); ?></h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم بالعربيه')); ?></label>
                <input type="text" id="" class="form-control name_ar"  >
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الاسم بالانجليزيه')); ?></label>
                <input type="text"  class="form-control name_en">
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('السعر')); ?></label>
                <input type="number" class="form-control price">
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('رقم الواتس اب')); ?></label>
                <input type="whatsapp" class="form-control whatsapp">
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('صاحب الاعلان')); ?></label>
                    <select name="category_id"   class="form-control category_id" >
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" ><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('صاحب الاعلان')); ?></label>
                    <select name="sub_category_id" class="form-control sub_category_id" >
                        <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subCategory->id); ?>" ><?php echo e($subCategory->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label"><?php echo e(awtTrans('صاحب الاعلان')); ?></label>
                    <select name="user_id" class="form-control user_id" >
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>" ><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالعربيه')); ?></label>
                <textarea class="form-control description_ar" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالعربيه')); ?></label>
                <textarea class="form-control description_en" cols="30" rows="10"></textarea>
            </div>
            <div id="additions">
                <div class="additions-head">
                    <p>اضافات</p>
                </div>
                <div class="additions-body additions-body-show">
                    
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('تحديد الموقع')); ?></label>
                 <div id="show_map" style="height: 400px; margin-top: 20px"></div>
                <input type="hidden" id="latitude3" name="latitude" value="">
                <input type="hidden" id="longitude3" name="longitude" value="">
            </div> 
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    
    

    <?php $__env->startComponent('dashboard.shared.components.deleteallmodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.deletemodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.scripts'); ?>
       <?php $__env->slot('moreScripts'); ?>
           <script>
                $(document).on('click','.add_additions_button',function(e){
                    var service_id = $(this).data('id')
                    $('#service_id').val(service_id)
                });

                $(document).on('click','.edit_additions_button',function(e){
                    var id = $(this).data('id')
                   $.ajax({
                        url: '<?php echo e(route('getAdditions')); ?>',
                        method: 'post',
                        data: {id : id,type : 0},
                        dataType:'json',
                        success: function(response){
                            $('.additions-body-edit').html(response.additions)
                        },
                    });
                });
                $(document).on('click','.delete_addition',function(e){
                    var id = $(this).data('id')
                   $.ajax({
                        url: '<?php echo e(route('deleteAdditions')); ?>',
                        method: 'post',
                        data: {id : id},
                        dataType:'json',
                        success: function(response){
                            toastr.error("<?php echo e(awtTrans('تم الحذف بنجاح')); ?>")
                        },
                    });
                });
                $(document).on('click','.remove-addition',function(e){
                    e.preventDefault();
                    $(this).parent().remove();
                });
                $(document).on('click','.add_additin',function(e){
                    e.preventDefault();
                    $(this).parent().parent().find ('.additions-body').append(`<div class="additions-collection">
                        <input type="text" class="form-control" name="addition_ar[]" placeholder="<?php echo e(awtTrans('اسم الاضافه بالعربيه')); ?>" required>
                        <input type="text" class="form-control" name="addition_en[]" placeholder="<?php echo e(awtTrans('اسم الاضافه بالانجليزيه')); ?>" required>
                        <input type="file" class="form-control" name="addition_images[]" required> 
                        <button class="remove-addition"><i class="fa fa-close" aria-hidden="true"></i></button>
                    </div>`)
                });
           </script>
           <script>
                $(document).on('click','.edit',function(e){
                    e.preventDefault();
                    editMap($(this).data('latitude'),$(this).data('longitude'))
                    getImages($(this).data('id'))
                    // getAdditions($(this).data('id'))
                });

               function getAdditions(id){
                    $.ajax({
                        url: '<?php echo e(route('getAdditions')); ?>',
                        method: 'post',
                        data: {id : id,type : 0},
                        dataType:'json',
                        success: function(response){
                            $('.additions-body-edit').html(response.additions)
                        },
                    });
                }
               function getImages(id){
                    $.ajax({
                        url: '<?php echo e(route('getImages')); ?>',
                        method: 'post',
                        data: {id : id,type : 0},
                        dataType:'json',
                        success: function(response){
                            $('.images_div').html(response.images)
                        },
                    });
                }


                function editMap(lat , lng){
                    document.getElementById("latitude2").value   = lat;
                    document.getElementById("longitude2").value  = lng;
                    var latlng = new google.maps.LatLng(parseFloat(lat) , parseFloat(lng));
                    var map = new google.maps.Map(document.getElementById('edit_map'), {
                        center: latlng,
                        zoom: 18,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng( lat, lng),
                        map: map,
                        title: 'Set lat/lon values for this property',
                        draggable: true
                    });

                    google.maps.event.addListener(marker, 'dragend', function (event) {
                        document.getElementById("latitude2").value  = this.getPosition().lat();
                        document.getElementById("longitude2").value  = this.getPosition().lng();
                    });
                }

                $(document).on('click','.remove',function(e){
                    e.preventDefault();
                    var id = this.id
                    $.ajax({
                        url: '<?php echo e(route('deleteImages')); ?>',
                        method: 'post',
                        data: {id : id},
                        dataType:'json',
                        success: (response) => {
                            if(response.done == 1){
                                $(this).parents('.uploaded-block').remove();
                                toastr.error("<?php echo e(awtTrans('تم الحذف بنجاح')); ?>")
                            }else if(response.done == 0){
                                toastr.error("<?php echo e(awtTrans('لا يمكن حذف اخر صوره للاعلان')); ?>")
                            }
                        },
                    });
                });

                $(document).on('click','.show-model',function(e){
                    e.preventDefault();
                    var id = $(this).data('id')
                    var lat = $(this).data('latitude');
                    var lng = $(this).data('longitude');
                    var latlng = new google.maps.LatLng(parseFloat(lat) , parseFloat(lng));
                    var map = new google.maps.Map(document.getElementById('show_map'), {
                        center: latlng,
                        zoom: 10,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });

                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng( lat, lng),
                        map: map,
                        title: 'Set lat/lon values for this property',
                        draggable: true
                    });

                     $.ajax({
                        url: '<?php echo e(route('getAdditions')); ?>',
                        method: 'post',
                        data: {id : $(this).data('id'),type : 1},
                        dataType:'json',
                        success: function(response){
                            $('.additions-body-show').html(response.additions)
                        },
                    });
                    getImages(id)
                });

           </script>
           <script>
                $(document).on('click','.active',function(e){
                    $.ajax({
                        url: '<?php echo e(route('activeServices')); ?>',
                        method: 'post',
                        data: {id : this.id},
                        dataType:'json',
                        success: (response) => {
                            if(response.status == 1){
                                $(this).html('<?php echo e(awtTrans("الغاء تفعيل")); ?>');
                                toastr.success("<?php echo e(awtTrans('تم تفعيل الاعلان بنجاح')); ?>")

                            }else{
                                $(this).html('<?php echo e(awtTrans(" تفعييل")); ?>');
                                toastr.error("<?php echo e(awtTrans('تم الغاء تفعيل الاعلان بنجاح')); ?>")
                            }
                        },
                    });
                })
            </script>
       <?php $__env->endSlot(); ?>     

    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\safari\resources\views/dashboard/services/index.blade.php ENDPATH**/ ?>