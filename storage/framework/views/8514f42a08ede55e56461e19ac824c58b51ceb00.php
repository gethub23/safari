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
            <th><?php echo e(awtTrans('العنوان بالعربيه')); ?></th>
            <th><?php echo e(awtTrans('السعر')); ?></th>
            <th><?php echo e(awtTrans('التصنيف')); ?></th>
            <th><?php echo e(awtTrans('الخصم')); ?></th>
            <th><?php echo e(awtTrans('التاريخ')); ?></th>
            <th><?php echo e(awtTrans('الصور')); ?> </th>
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
                    <td><img src="<?php echo e(appPath()); ?>/images/services/<?php echo e($row->images->first()->image); ?>" alt="row-img" width="60px" title="Mat Helme" class="img-circle img-thumbnail img-responsive"></td>
                    <td><?php echo e($row->title_ar); ?></td>
                    <td><?php echo e($row->price); ?></td>
                    <td><?php echo e($row->category->name); ?></td>
                    <td><?php echo e($row->discount != null ? $row->discount .'%' : 'لا يوجد خصم'); ?></td>
                    <td><?php echo e($row->created_at->diffForHumans()); ?></td>
                     <td class="text-center">
                        <i id="<?php echo e($row->id); ?>" class="show zmdi zmdi-image  zmdi-hc-fw zmdi-hc-lg text-primary images"></i>
                    </td>
                    <?php $__env->startComponent('dashboard.shared.components.editbutton', ['row'   =>[
                        'id'             => $row->id ,
                        'title_ar'       => $row->title_ar ,
                        'title_en'       => $row->title_en ,
                        'description_ar' => $row->description_ar ,
                        'description_en' => $row->description_en ,
                        'price'          => $row->price ,
                        'discount'       => $row->discount ,
                        'discount_expire'=> $row->discount_expire ,
                        'people_number'  => $row->people_number ,
                        'location'       => $row->location ,
                        'type'           => $row->type ,
                        'user_id'        => $row->user_id ,
                        'latitude'       => $row->latitude ,
                        'longitude'      => $row->longitude ,
                        'category_id'    => $row->category_id ,
                    ]]); ?><?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('dashboard.shared.components.showbutton', ['row'   =>[
                        'id'             => $row->id ,
                        'title_ar'       => $row->title_ar ,
                        'title_en'       => $row->title_en ,
                        'description_ar' => $row->description_ar ,
                        'description_en' => $row->description_en ,
                        'price'          => $row->price ,
                        'discount'       => $row->discount ,
                        'discount_expire'=> $row->discount_expire ,
                        'people_number'  => $row->people_number ,
                        'location'       => $row->location ,
                        'type'           => $row->type ,
                        'user_id'        => $row->user_id ,
                        'latitude'       => $row->latitude ,
                        'longitude'      => $row->longitude ,
                        'category_id'    => $row->category_id ,
                    ]]); ?><?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('dashboard.shared.components.deletebutton', ['id' => $row->id]); ?> <?php echo $__env->renderComponent(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
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
                        <h5><?php echo e(awtTrans('صور الخدمه')); ?></h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالعربيه')); ?></label>
                <input type="text" name="title_ar" id="" class="form-control" value="<?php echo e(old('title_ar')); ?>"  placeholder="<?php echo e(awtTrans('ادخل العنوان بالعربيه')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالانجليزيه')); ?></label>
                <input type="text" name="title_en" id="" class="form-control" value="<?php echo e(old('title_en')); ?>"  placeholder="<?php echo e(awtTrans('ادخل العنوان بالانجليزيه')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالعربيه')); ?></label>
                <textarea class="form-control" name="description_ar" id="" cols="30" rows="10" required placeholder="<?php echo e(awtTrans('ادخل الوصف بالعربيه')); ?>"><?php echo e(old('phone')); ?></textarea>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالانجليزيه')); ?></label>
                <textarea class="form-control" name="description_en" id="" cols="30" rows="10" required placeholder="<?php echo e(awtTrans('الوصف بالانجليزيه')); ?>"><?php echo e(old('description_en')); ?></textarea>
            </div>

            <div class="form-group col-sm-4 col-md-4 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('السعر')); ?></label>
                <input type="number" name="price" id="" class="form-control" value="<?php echo e(old('price')); ?>"  placeholder="<?php echo e(awtTrans('ادخل السعر')); ?>" autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-4 col-md-4 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الخصم')); ?></label>
                <input type="number" name="discount" id="" class="form-control" value="<?php echo e(old('discount')); ?>"  placeholder="<?php echo e(awtTrans('ادخل الخصم')); ?>" autocomplete="nope" >
            </div>
            <div class="form-group col-sm-4 col-md-4 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('تاريخ انتهاء الخصم')); ?></label>
                <input type="date" name="discount_expire" id="" class="form-control" value="<?php echo e(old('discount_expire')); ?>"  placeholder="<?php echo e(awtTrans('تاريخ انتهاء القسم')); ?>" autocomplete="nope" >
            </div>
            <div class="col-md-12" class="form-group">
                <label for="field-3" class="control-label"><?php echo e(awtTrans('مقدم الخدمه')); ?></label>
                <select name="user_id" id="" required class="form-control">
                    <option value=> <?php echo e(awtTrans('اختر مقدم الخدمه')); ?></option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == old('user_id') ? 'selected' : ''); ?> id="<?php echo e($user->category->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="holls_div col-sm-12">
                <div class="form-group col-sm-12 col-md-12 mw-100 " >
                    <label for="field-1" class="control-label"><?php echo e(awtTrans('عدد الافراد')); ?></label>
                    <input type="number" name="people_number" id="" class="form-control" value="<?php echo e(old('people_number')); ?>"  placeholder="<?php echo e(awtTrans('سعه القاعه')); ?>" autocomplete="nope" >
                </div>
                <div class="col-md-12">
                        <span class="col-sm-4 control-label" style="margin-bottom: 10px">تحديد الموقع</span>
                        <div id="map" style="height: 400px; margin-top: 20px"></div>
                        <input type="hidden" id="latitude" name="latitude" value="">
                        <input type="hidden" id="longitude" name="longitude" value="">
                </div>
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
                        <div class="upload-area"></div>
                        <h5><?php echo e(awtTrans('المزيد من صور الخدمه')); ?></h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالعربيه')); ?></label>
                <input type="text" name="title_ar" id="title_ar" class="form-control" value="<?php echo e(old('title_ar')); ?>"  placeholder="<?php echo e(awtTrans('ادخل العنوان بالعربيه')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالانجليزيه')); ?></label>
                <input type="text" name="title_en" id="title_en" class="form-control" value="<?php echo e(old('title_en')); ?>"  placeholder="<?php echo e(awtTrans('ادخل العنوان بالانجليزيه')); ?>" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالعربيه')); ?></label>
                <textarea class="form-control" name="description_ar" id="description_ar" cols="30" rows="10" required placeholder="<?php echo e(awtTrans('ادخل الوصف بالعربيه')); ?>"><?php echo e(old('phone')); ?></textarea>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالانجليزيه')); ?></label>
                <textarea class="form-control" name="description_en" id="description_en" cols="30" rows="10" required placeholder="<?php echo e(awtTrans('الوصف بالانجليزيه')); ?>"><?php echo e(old('description_en')); ?></textarea>
            </div>

            <div class="form-group col-sm-4 col-md-4 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('السعر')); ?></label>
                <input type="number" name="price" id="price" class="form-control" value="<?php echo e(old('price')); ?>"  placeholder="<?php echo e(awtTrans('ادخل السعر')); ?>" autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-4 col-md-4 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الخصم')); ?></label>
                <input type="number" name="discount" id="discount" class="form-control" value="<?php echo e(old('discount')); ?>"  placeholder="<?php echo e(awtTrans('ادخل الخصم')); ?>" autocomplete="nope" >
            </div>
            <div class="form-group col-sm-4 col-md-4 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('تاريخ انتهاء الخصم')); ?></label>
                <input type="date" name="discount_expire" id="discount_expire" class="form-control" value="<?php echo e(old('discount_expire')); ?>"  placeholder="<?php echo e(awtTrans('تاريخ انتهاء القسم')); ?>" autocomplete="nope" >
            </div>
            <div class="col-md-12" class="form-group">
                <label for="field-3" class="control-label"><?php echo e(awtTrans('مقدم الخدمه')); ?></label>
                <select name="user_id" id="user_id" required class="form-control">
                    <option value=> <?php echo e(awtTrans('اختر مقدم الخدمه')); ?></option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == old('user_id') ? 'selected' : ''); ?> id="<?php echo e($user->category->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="holls_div col-sm-12">
                <div class="form-group col-sm-12 col-md-12 mw-100 " >
                    <label for="field-1" class="control-label"><?php echo e(awtTrans('عدد الافراد')); ?></label>
                    <input type="number" name="people_number" id="people_number" class="form-control" value="<?php echo e(old('people_number')); ?>"  placeholder="<?php echo e(awtTrans('سعه القاعه')); ?>" autocomplete="nope" >
                </div>
                <div class="col-md-12">
                    <span class="col-sm-4 control-label" style="margin-bottom: 10px">تحديد الموقع</span>
                    <div id="edit_map" style="height: 400px; margin-top: 20px"></div>
                    <input type="hidden" id="latitude2" name="latitude" value="">
                    <input type="hidden" id="longitude2" name="longitude" value="">
                </div>
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?> 

    <?php $__env->startComponent('dashboard.shared.components.showmodel'); ?> 
        <?php $__env->slot('ShowModelContent'); ?>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالعربيه')); ?></label>
                <input type="text" name="title_ar" id="" class="form-control title_ar" >
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('العنوان بالانجليزيه')); ?></label>
                <input type="text" name="title_en" id="" class="form-control title_en" autocomplete="nope" >
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالعربيه')); ?></label>
                <textarea class="form-control description_ar" name="description_ar" id="" cols="30" rows="10" ></textarea>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> <?php echo e(awtTrans('الوصف بالانجليزيه')); ?></label>
                <textarea class="form-control description_en" name="description_en" id="" cols="30" rows="10"  ></textarea>
            </div>

            <div class="form-group col-sm-4 col-md-4 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('السعر')); ?></label>
                <input type="number" name="price" id="" class="form-control price" >
            </div>
            <div class="form-group col-sm-4 col-md-4 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('الخصم')); ?></label>
                <input type="number" name="discount" id="" class="form-control discount" >
            </div>
            <div class="form-group col-sm-4 col-md-4 mw-100">
                <label for="field-1" class="control-label"><?php echo e(awtTrans('تاريخ انتهاء الخصم')); ?></label>
                <input type="date" name="discount_expire" id="" class="form-control discount_expire"  >
            </div>
            <div class="col-md-12" class="form-group">
                <label for="field-3" class="control-label"><?php echo e(awtTrans('مقدم الخدمه')); ?></label>
                <select name="user_id" class="form-control user_id">
                    <option value=> <?php echo e(awtTrans('اختر مقدم الخدمه')); ?></option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == old('user_id') ? 'selected' : ''); ?> id="<?php echo e($user->category->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="holls_div col-sm-12">
                <div class="form-group col-sm-12 col-md-12 mw-100 " >
                    <label for="field-1" class="control-label"><?php echo e(awtTrans('عدد الافراد')); ?></label>
                    <input type="number" name="people_number" id="" class="form-control people_number">
                </div>
                <div class="col-md-12">
                    <span class="col-sm-4 control-label" style="margin-bottom: 10px">تحديد الموقع</span>
                    <div id="show_map" style="height: 400px; margin-top: 20px"></div>
                    <input type="hidden" id="latitude2" name="latitude" value="">
                    <input type="hidden" id="longitude2" name="longitude" value="">
                </div>
            </div>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="modal fade" id="images" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h2 class="modal-title" id="exampleModalCenterTitle"> <?php echo e(awtTrans('عرض الصور')); ?></h2>
                </div>
                <div class="modal-body">
                    <form id="show_form">
                        <div class="container">
                            <div class="row images_div">

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

    <?php $__env->startComponent('dashboard.shared.components.deleteallmodel'); ?> <?php echo $__env->renderComponent(); ?>
    <?php $__env->startComponent('dashboard.shared.components.deletemodel'); ?> <?php echo $__env->renderComponent(); ?>

    <?php $__env->startComponent('dashboard.shared.components.scripts'); ?>
        <?php $__env->slot('moreScripts'); ?>
            <script>
                $('.holls_div').hide()
                $('select[name=user_id]').change(function () { 
                   if($(this).children(":selected").attr("id") == 1){
                       $('.holls_div').show()
                   }else{
                       $('.holls_div').hide()
                   }
                });
            </script>
            <script>
                  $('.show').click(function (e) {
                    if($(this).data('category_id') == 1){
                        $('.holls_div').show()
                    }else{
                        $('.holls_div').hide()
                    }

                     e.preventDefault();
                    var latitude = $(this).data('latitude');
                    var longitude = $(this).data('longitude');

                    var lat = latitude;
                    var lng = longitude;
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

                    google.maps.event.addListener(marker, 'dragend', function (event) {
                        document.getElementById("latitude2").value  = this.getPosition().lat();
                        document.getElementById("longitude2").value  = this.getPosition().lng();
                    });
                 })
            </script>
             <script>
                $('.edit').click(function (e) {
                   if($(this).data('category_id') == 1){
                       $('.holls_div').show()
                   }else{
                       $('.holls_div').hide()
                   }
                    e.preventDefault();
                    var latitude = $(this).data('latitude');
                    var longitude = $(this).data('longitude');

                    var lat = latitude;
                    var lng = longitude;
                    var latlng = new google.maps.LatLng(parseFloat(lat) , parseFloat(lng));
                    var map = new google.maps.Map(document.getElementById('edit_map'), {
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

                    google.maps.event.addListener(marker, 'dragend', function (event) {
                        document.getElementById("latitude2").value  = this.getPosition().lat();
                        document.getElementById("longitude2").value  = this.getPosition().lng();
                    });
                });
            </script>
             <script>
                $(document).on('click','.images',function(e){
                    e.preventDefault();
                    var id = this.id
                    $.ajax({
                        url: '<?php echo e(route('getImages')); ?>',
                        method: 'post',
                        data: {id : id},
                        dataType:'json',
                        success: function(response){
                            $('.images_div').html(response.images)
                            $('.carousel-inner .carousel-item:first').addClass('active');
                            $('#images').modal('show');
                        },
                    });
                });

                $(document).on('click','.remove_section',function(e){
                    e.preventDefault();
                    var id = this.id
                    $.ajax({
                        url: '<?php echo e(route('deleteImages')); ?>',
                        method: 'post',
                        data: {id : id},
                        dataType:'json',
                        success: (response) => {
                            if(response.done == 1){
                                $(this).parent().remove()
                                $('.carousel-inner .carousel-item:first').addClass('active');
                                toastr.error("<?php echo e(awtTrans('تم الحذف بنجاح')); ?>")
                            }else if(response.done == 0){
                                toastr.error("<?php echo e(awtTrans('لا يمكن حذف اخر صوره للخدمه')); ?>")
                            }
                        },
                    });
                });
            </script>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/dashboard/services/index.blade.php ENDPATH**/ ?>