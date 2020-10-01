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
                    <th>{{awtTrans('العنوان')}}</th>
                    <th>{{awtTrans('الوصف')}}</th>
                    <th>{{awtTrans('التاريخ')}}</th>
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
                            <td><img src="{{appPath()}}/images/intros/{{$row->image}}" alt="row-img" width="60px" title="Mat Helme" class="img-circle img-thumbnail img-responsive"></td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->description}}</td>
                            <td>{{$row->created_at->diffForHumans()}}</td>
                            @EditButton(['row'     =>[
                                'id'               => $row->id ,
                                'title_ar'         => $row->title_ar ,
                                'title_en'         => $row->title_en ,
                                'description_ar'   => $row->description_ar ,
                                'description_en'   => $row->description_en ,
                                'image'            => $row->image ,
                            ]])@endEditButton
                            @ShowButton(['row'     =>[
                                'id'               => $row->id ,
                                'title_ar'         => $row->title_ar ,
                                'title_en'         => $row->title_en ,
                                'description_ar'   => $row->description_ar ,
                                'description_en'   => $row->description_en ,
                                'image'            => $row->image ,
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
    @AddModel
        @slot('AddModelContent')
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <div class="text-center">
                    <div class="images-upload-block">
                        <label class="upload-img">
                            <input type="file" accept="image/*" class="image-uploader" name="image">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area"></div>
                        <h5> {{awtTrans('الصوره')}}</h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('العنوان بالعربيه')}}</label>
                <input type="text" name="title_ar" id="" class="form-control" value="{{old('title_ar')}}"  placeholder="{{awtTrans('ادخل العنوان بالعربيه')}}" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('العنوان بالانجليزيه ')}}</label>
                <input type="text" name="title_en" id="" class="form-control" value="{{old('title_en')}}"  placeholder="{{awtTrans('ادخل العنوان بالانجليزيه')}}" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label">{{awtTrans('الوصف بالعربيه ')}}</label>
                <textarea name="description_ar"  class="form-control"  cols="30" rows="10" placeholder="{{awtTrans('ادخل الوصف بالعربيه ')}}">{{old('description_ar')}}</textarea>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label">{{awtTrans('الوصف بالانجليزيه ')}}</label>
                <textarea name="description_en"  class="form-control"  cols="30" rows="10" placeholder="{{awtTrans('ادخل الوصف بالانجليزيه ')}}">{{old('description_en')}}</textarea>
            </div>
        @endslot
    @endAddModel

    @EditModel
        @slot('EditModelContent')
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <div class="text-center">
                    <div class="images-upload-block">
                        <label class="upload-img">
                            <input type="file" accept="image/*" class="image-uploader" name="image" >
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area">
                            <div class="uploaded-block" data-count-order="0">
                                <img src="" href="{{url('public/images/intros/')}}" id="image">
                                <button class="close">×</button>
                            </div>
                        </div>
                        <div class="upload-area"></div>
                        <h5>{{awtTrans('الصوره الشخصيه')}}</h5>
                    </div>
                </div>
            </div>

           <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('العنوان بالعربيه')}}</label>
                <input type="text" name="title_ar" id="title_ar" class="form-control"   placeholder="{{awtTrans('ادخل العنوان بالعربيه')}}"  required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('العنوان بالانجليزيه ')}}</label>
                <input type="text" name="title_en" id="title_en" class="form-control"  placeholder="{{awtTrans('ادخل العنوان بالانجليزيه')}}"  required>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label">{{awtTrans('الوصف بالعربيه ')}}</label>
                <textarea name="description_ar" id="description_ar"  class="form-control"  cols="30" rows="10" placeholder="{{awtTrans('ادخل الوصف بالعربيه ')}}"></textarea>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label">{{awtTrans('الوصف بالانجليزيه ')}}</label>
                <textarea name="description_en" id="description_en"  class="form-control"  cols="30" rows="10" placeholder="{{awtTrans('ادخل الوصف بالانجليزيه ')}}"></textarea>
            </div>
        @endslot
    @endEditModel

    @ShowModel
        @slot('ShowModelContent')

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <div class="text-center">
                    <div class="images-upload-block">
                        <label class="upload-img">
                            <input type="file" accept="image/*" class="image-uploader" name="image" >
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area">
                            <div class="uploaded-block" data-count-order="0">
                                <img src=""  href="{{url('public/images/intros/')}}" class="image">
                            </div>
                        </div>
                        <div class="upload-area"></div>
                        <h5>{{awtTrans('الصوره')}}</h5>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('العنوان بالعربيه')}}</label>
                <input type="text" name="title_ar" id="" class="form-control title_ar"   placeholder="{{awtTrans('ادخل العنوان بالعربيه')}}"  required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('العنوان بالانجليزيه ')}}</label>
                <input type="text" name="title_en" id="" class="form-control title_en"  placeholder="{{awtTrans('ادخل العنوان بالانجليزيه')}}"  required>
            </div>

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label">{{awtTrans('الوصف بالعربيه ')}}</label>
                <textarea name="description_ar" id=""  class="form-control description_ar"  cols="30" rows="10" placeholder="{{awtTrans('ادخل الوصف بالعربيه ')}}"></textarea>
            </div>
            <div class="form-group col-sm-12 col-md-12 mw-100">
                <label for="field-1" class="control-label">{{awtTrans('الوصف بالانجليزيه ')}}</label>
                <textarea name="description_en" id=""  class="form-control description_en"  cols="30" rows="10" placeholder="{{awtTrans('ادخل الوصف بالانجليزيه ')}}"></textarea>
            </div>
        @endslot
    @endShowModel
    @DeleteAllModel @endDeleteAllModel
    @DeleteModel @endDeleteModel
    @Scripts  @endScripts
@endsection
