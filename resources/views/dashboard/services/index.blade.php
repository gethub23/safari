@extends('dashboard.layouts.app')
@section('title'){{awtTrans($pluralName)}}@endsection
@section('content')
    <div class="gx-card">
        @Reload @endReload
        @DeleteAll @endAddButton
        @AddButton @endAddButton
    </div>
    <div class="gx-card Block_Up">
      @if($rows->count())
            @Table
                @slot('tableHead')
                    <th>
                        <div class="form-checkbox">
                            <input type="checkbox" value="value1" name="name1" id="checkedAll">
                            <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                        </div>
                    </th>
                    <th>{{awtTrans('الصورة')}} </th>
                    <th>{{awtTrans('صاحب الخدمه')}}</th>
                    <th>{{awtTrans('العنوان')}}</th>
                    <th>{{awtTrans('السعر')}}</th>
                    <th> * </th>
                    <th>{{awtTrans('التاريخ')}}</th>
                    <th>{{awtTrans('تعديل الاضافات')}} </th>
                    <th>{{awtTrans('اضافه الاضافات')}} </th>
                    <th>{{awtTrans('تعديل')}} </th>
                    <th>{{awtTrans('عرض')}} </th>
                    <th>{{awtTrans('حذف')}} </th>
                @endslot

                @slot('tableBody')
                    @foreach($rows as $row)
                        <tr id="hide_on_delete_{{$row->id}}">
                            <td class="text-center">
                                <div class="form-checkbox">
                                    <input type="checkbox" class="checkSingle" id="{{$row->id}}">
                                    <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                                </div>
                            </td>
                            <td><img src="{{appPath()}}/images/services/{{$row->images->first()->image}}" alt="row-img" width="60px" class="img-circle img-thumbnail img-responsive"></td>
                            <td>{{$row->user->name}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->price}}</td>
                            <td>
                               @if($row->accepted == 0)
                                     غير مفعل
                                    <hr>
                                    <button class="active" id="{{$row->id}}" style="background: #f44336;padding: 2px;margin: 2px;border-radius: 2px;color: white;"> تفعيل</button>
                                @else
                                    مفعل
                                    <hr>
                                    <button class="active" id="{{$row->id}}" style="background: #f44336;padding: 2px;margin: 2px;border-radius: 2px;color: white;">الغاء تفعيل</button>
                                @endif
                            </td>
                            <td>{{$row->created_at->diffForHumans()}}</td>
                            <td class="text-center">
                                @if ($row->additions->count() > 0)
                                    <i  data-toggle="modal" data-target="#2222" data-id="{{$row->id}}" class="edit_additions_button zmdi zmdi-edit zmdi-hc-fw zmdi-hc-lg text-primary"></i>
                                @else
                                     {{awtTrans('لا يوجد')}}    
                                @endif
                                
                            </td>
                            <td class="text-center">
                                    <i  data-toggle="modal" data-target="#3333" data-id="{{$row->id}}" class="add_additions_button zmdi zmdi-plus zmdi-hc-fw zmdi-hc-lg text-primary"></i>
                            </td>
                            @EditButton(['row'   =>[
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
                            ]])@endEditButton
                            @ShowButton(['row'   =>[
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

                            ]])@endShowButton
                            @DeleteButton(['id' => $row->id]) @endDeleteButton
                        </tr>
                    @endforeach
                @endslot
            @endTable
      @else
          <div class="Err_Block">
              <img  src="{{url('public/design/admin/images/no_found.png')}}">
          </div>
      @endif
    </div>

    <div class="modal fade" id="2222" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h2 class="modal-title" id="exampleModalCenterTitle"> {{awtTrans('الاضافات')}}</h2>
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
                            <a href="javascript:void(0)" class="btn text-secondary card-link" data-dismiss="modal">{{awtTrans('اغلاق')}}</a>
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
                    <h2 class="modal-title" id="exampleModalCenterTitle"> {{awtTrans('الاضافات')}}</h2>
                </div>
                <div class="modal-body">
                    <form action="{{url('admin/addAdditions')}}" enctype="multipart/form-data" method="POST">
                          @csrf
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
                                            <input type="text" class="form-control" name="addition_ar[]" placeholder="{{awtTrans('اسم الاضافه بالعربيه')}}" required>
                                            <input type="text" class="form-control" name="addition_en[]" placeholder="{{awtTrans('اسم الاضافه بالانجليزيه')}}" required>
                                            <input type="file" class="form-control" name="addition_images[]" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <hr>
                            <button type="submit" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5">{{awtTrans('اضافه')}}</button>
                            <a href="javascript:void(0)" class="btn text-secondary card-link" data-dismiss="modal">{{awtTrans('اغلاق')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @AddModel
        @slot('AddModelContent')
            <div class="form-group col-sm-12 col-md-12 mw-100 multi_img">
                <div class="text-center">
                    <div class="images-upload-block">
                        <label class="upload-img">
                            <input type="file" accept="image/*" class="image-uploader" name="images[]" multiple >
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area"></div>
                        <h5>{{awtTrans('صور الاعلان')}}</h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم بالعربيه')}}</label>
                <input type="text" name="name_ar" id="" class="form-control" value="{{old('name_ar')}}"  placeholder="{{awtTrans('ادخل الاسم بالعربيه')}}" autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم بالانجليزيه')}}</label>
                <input type="text" name="name_en" id="" class="form-control" value="{{old('name_en')}}"  placeholder="{{awtTrans('ادخل الاسم بالانجليزيه')}}" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('السعر')}}</label>
                <input type="number" name="price" id="" class="form-control" value="{{old('price')}}"  placeholder="{{awtTrans('ادخل السعر')}}" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('رقم الواتس اب')}}</label>
                <input type="number" name="whatsapp" id="" class="form-control" value="{{old('whatsapp')}}"  placeholder="{{awtTrans('ادخل رقم الواتس')}}" autocomplete="nope" required>
            </div>

             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('صاحب الاعلان')}}</label>
                    <select name="category_id" id="" required class="form-control" required>
                        <option value=> {{awtTrans('اختر القسم')}}</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('صاحب الاعلان')}}</label>
                    <select name="sub_category_id" id="" required class="form-control" required>
                        <option value=> {{awtTrans('اختر القسم الفرعي')}}</option>
                        @foreach ($subCategories as $subCategory)
                            <option value="{{$subCategory->id}}" >{{$subCategory->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('صاحب الاعلان')}}</label>
                    <select name="user_id" id="" required class="form-control" required>
                        <option value=> {{awtTrans('اختر المستخدم')}}</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" >{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الوصف بالعربيه')}}</label>
                <textarea name="description_ar" class="form-control" cols="30" rows="10" placeholder="{{awtTrans('ادخل الوصف بالعربيه')}}" required>{{old('description_ar')}}</textarea>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الوصف بالعربيه')}}</label>
                <textarea name="description_en" class="form-control" cols="30" rows="10" placeholder="{{awtTrans('ادخل الوصف بالعربيه')}}" required>{{old('description_en')}}</textarea>
            </div>

            <div id="additions">
                <div class="additions-head">
                    <p>اضافات</p>
                    <span  class="add_additin">  <i class="fa fa-plus" aria-hidden="true"></i> </span>
                </div>
                <div class="additions-body">
                    <div class="additions-collection">
                        <input type="text" class="form-control" name="addition_ar[]" placeholder="{{awtTrans('اسم الاضافه بالعربيه')}}" required>
                        <input type="text" class="form-control" name="addition_en[]" placeholder="{{awtTrans('اسم الاضافه بالانجليزيه')}}" required>
                        <input type="file" class="form-control" name="addition_images[]" required> 
                        <button class="remove-addition"><i class="fa fa-close" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>

             <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('تحديد الموقع')}}</label>
                 <div id="map" style="height: 400px; margin-top: 20px"></div>
                <input type="hidden" id="latitude" name="latitude" value="">
                <input type="hidden" id="longitude" name="longitude" value="">
            </div>
        @endslot
    @endAddModel

    @EditModel
        @slot('EditModelContent')
             <div class="form-group col-sm-12 col-md-12 mw-100 multi_img">
                <div class="text-center">
                    <div class="images-upload-block">
                        <label class="upload-img">
                            <input type="file" accept="image/*" class="image-uploader" name="images[]" multiple >
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area images_div">

                        </div>
                        <h5>{{awtTrans('صور الاعلان')}}</h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم بالعربيه')}}</label>
                <input type="text" name="name_ar" id="name_ar" class="form-control"  placeholder="{{awtTrans('ادخل الاسم بالعربيه')}}"  required>
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم بالانجليزيه')}}</label>
                <input type="text" name="name_en" id="name_en" class="form-control" placeholder="{{awtTrans('ادخل الاسم بالانجليزيه')}}"  required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('السعر')}}</label>
                <input type="number" name="price" id="price" class="form-control"  placeholder="{{awtTrans('ادخل السعر')}}"  required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('رقم الواتس اب')}}</label>
                <input type="number" name="whatsapp" id="whatsapp" class="form-control"  placeholder="{{awtTrans('ادخل رقم الواتس اب')}}"  required>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('صاحب الاعلان')}}</label>
                    <select name="category_id" id="category_id" required class="form-control" required>
                        <option value=> {{awtTrans('اختر القسم')}}</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('صاحب الاعلان')}}</label>
                    <select name="sub_category_id" id="sub_category_id" required class="form-control" required>
                        <option value=> {{awtTrans('اختر القسم الفرعي')}}</option>
                        @foreach ($subCategories as $subCategory)
                            <option value="{{$subCategory->id}}" >{{$subCategory->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('صاحب الاعلان')}}</label>
                    <select name="user_id" id="user_id"  class="form-control" required>
                        <option value=> {{awtTrans('اختر المستخدم')}}</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" >{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الوصف بالعربيه')}}</label>
                <textarea name="description_ar" id="description_ar" class="form-control" cols="30" rows="10" placeholder="{{awtTrans('ادخل الوصف بالعربيه')}}" required>{{old('description_ar')}}</textarea>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الوصف بالعربيه')}}</label>
                <textarea name="description_en" id="description_en" class="form-control" cols="30" rows="10" placeholder="{{awtTrans('ادخل الوصف بالعربيه')}}" required>{{old('description_en')}}</textarea>
            </div>

             <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('تحديد الموقع')}}</label>
                 <div id="edit_map" style="height: 400px; margin-top: 20px"></div>
                <input type="hidden" id="latitude2" name="latitude" value="">
                <input type="hidden" id="longitude2" name="longitude" value="">
            </div>

        @endslot
    @endEditModel

    @ShowModel
        @slot('ShowModelContent')
           <div class="form-group col-sm-12 col-md-12 mw-100 multi_img">
                <div class="text-center">
                    <div class="images-upload-block">
                        <div class="upload-area images_div"> </div>
                        <h5>{{awtTrans('صور الاعلان')}}</h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم بالعربيه')}}</label>
                <input type="text" id="" class="form-control name_ar"  >
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم بالانجليزيه')}}</label>
                <input type="text"  class="form-control name_en">
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('السعر')}}</label>
                <input type="number" class="form-control price">
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('رقم الواتس اب')}}</label>
                <input type="whatsapp" class="form-control whatsapp">
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('صاحب الاعلان')}}</label>
                    <select name="category_id"   class="form-control category_id" >
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('صاحب الاعلان')}}</label>
                    <select name="sub_category_id" class="form-control sub_category_id" >
                        @foreach ($subCategories as $subCategory)
                            <option value="{{$subCategory->id}}" >{{$subCategory->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

             <div class="col-md-4">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('صاحب الاعلان')}}</label>
                    <select name="user_id" class="form-control user_id" >
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" >{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الوصف بالعربيه')}}</label>
                <textarea class="form-control description_ar" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الوصف بالعربيه')}}</label>
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
                <label for="field-1" class="control-label"> {{awtTrans('تحديد الموقع')}}</label>
                 <div id="show_map" style="height: 400px; margin-top: 20px"></div>
                <input type="hidden" id="latitude3" name="latitude" value="">
                <input type="hidden" id="longitude3" name="longitude" value="">
            </div> 
        @endslot
    @endShowModel
    
    

    @DeleteAllModel @endDeleteAllModel
    @DeleteModel @endDeleteModel
    @Scripts
       @slot('moreScripts')
           <script>
                $(document).on('click','.add_additions_button',function(e){
                    var service_id = $(this).data('id')
                    $('#service_id').val(service_id)
                });

                $(document).on('click','.edit_additions_button',function(e){
                    var id = $(this).data('id')
                   $.ajax({
                        url: '{{route('getAdditions')}}',
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
                        url: '{{route('deleteAdditions')}}',
                        method: 'post',
                        data: {id : id},
                        dataType:'json',
                        success: function(response){
                            toastr.error("{{awtTrans('تم الحذف بنجاح')}}")
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
                        <input type="text" class="form-control" name="addition_ar[]" placeholder="{{awtTrans('اسم الاضافه بالعربيه')}}" required>
                        <input type="text" class="form-control" name="addition_en[]" placeholder="{{awtTrans('اسم الاضافه بالانجليزيه')}}" required>
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
                        url: '{{route('getAdditions')}}',
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
                        url: '{{route('getImages')}}',
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
                        url: '{{route('deleteImages')}}',
                        method: 'post',
                        data: {id : id},
                        dataType:'json',
                        success: (response) => {
                            if(response.done == 1){
                                $(this).parents('.uploaded-block').remove();
                                toastr.error("{{awtTrans('تم الحذف بنجاح')}}")
                            }else if(response.done == 0){
                                toastr.error("{{awtTrans('لا يمكن حذف اخر صوره للاعلان')}}")
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
                        url: '{{route('getAdditions')}}',
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
                        url: '{{route('activeServices')}}',
                        method: 'post',
                        data: {id : this.id},
                        dataType:'json',
                        success: (response) => {
                            if(response.status == 1){
                                $(this).html('{{awtTrans("الغاء تفعيل")}}');
                                toastr.success("{{awtTrans('تم تفعيل الاعلان بنجاح')}}")

                            }else{
                                $(this).html('{{awtTrans(" تفعييل")}}');
                                toastr.error("{{awtTrans('تم الغاء تفعيل الاعلان بنجاح')}}")
                            }
                        },
                    });
                })
            </script>
       @endslot     

    @endScripts
@endsection
