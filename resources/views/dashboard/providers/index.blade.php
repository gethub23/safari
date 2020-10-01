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
                    <th>{{awtTrans('الصورة')}}</th>
                    <th>{{awtTrans('الاسم')}}</th>
                    <th>{{awtTrans('رقم الهاتف')}}</th>
                    <th>{{awtTrans('الحالة')}}</th>
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
                        <td><img src="{{imageUrl('users',$row->avatar)}}" alt="row-img" width="60px" title="Mat Helme" class="img-circle img-thumbnail img-responsive"></td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->phone}}</td>
                        <td>
                            @if($row->active == 0)
                                <span class="label label-danger">{{awtTrans('غير متصل')}}</span>
                            @else
                                <span class="label label-success">{{awtTrans('متصل')}}</span>
                            @endif
                        </td>
                        <td>{{$row->created_at->diffForHumans()}}</td>
                        @EditButton(['row' =>[
                            'id'            => $row->id ,
                            'name'          => $row->name ,
                            'phone'         => $row->phone ,
                            'avatar'        => $row->avatar ,
                            'active'        => $row->active ,
                        ]])   @endEditButton
                        @ShowButton(['row' =>[
                            'id'            => $row->id ,
                            'name'          => $row->name ,
                            'phone'         => $row->phone ,
                            'avatar'        => $row->avatar ,
                            'active'        => $row->active ,
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
                            <input type="file" accept="image/*" class="image-uploader" name="avatar">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area"></div>
                        <h5> {{awtTrans('الصوره الشخصيه')}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-1" class="control-label">{{awtTrans('الاسم')}}</label>
                    <input type="text" autocomplete="nope" name="name" required class="form-control" placeholder="{{awtTrans('اوامر الشبكة')}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-2" class="control-label">{{awtTrans('رقم الهاتف')}}</label>
                    <input type="number" autocomplete="nope" name="phone" required class="form-control " placeholder="05011000000">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('كلمة السر')}}</label>
                    <input type="password" autocomplete="nope" name="password" required class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('الحاله')}}</label>
                    <select name="active" required class="form-control">
                            <option value>{{awtTrans('اختر الحاله')}} </option>
                            <option value ='1'>{{awtTrans('متصل')}} </option>
                            <option value ='0'>{{awtTrans('غير متصل')}} </option>
                    </select>
                </div>
            </div>
        @endslot
    @endAddModel

    @EditModel
       @slot('EditModelContent')
           <div class="form-group col-sm-12 col-md-12 mw-100">
               <div class="text-center">
                   <div class="images-upload-block">
                       <label class="upload-img">
                           <input type="file" accept="image/*" class="image-uploader" name="avatar" >
                           <i class="fa fa-camera" aria-hidden="true"></i>
                       </label>
                       <div class="upload-area">
                           <div class="uploaded-block" data-count-order="0">
                               <img src="" href="{{url('public/images/users/')}}" id="avatar">
                               <button class="close">×</button>
                           </div>
                       </div>
                       <div class="upload-area"></div>
                       <h5>{{awtTrans('الصوره الشخصيه')}}</h5>
                   </div>
               </div>
           </div>

           <div class="col-md-6">
                <div class="form-group">
                    <label for="field-1" class="control-label">{{awtTrans('الاسم')}}</label>
                    <input type="text" autocomplete="nope" name="name" id="name" required class="form-control" placeholder="{{awtTrans('اوامر الشبكة')}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-2" class="control-label">{{awtTrans('رقم الهاتف')}}</label>
                    <input type="number" autocomplete="nope" name="phone" id="phone" required class="form-control " placeholder="05011000000">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('كلمة السر')}}</label>
                    <input type="password" autocomplete="nope" name="password" required class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('الحاله')}}</label>
                    <select name="active" id="active" required class="form-control">
                            <option value>{{awtTrans('اختر الحاله')}} </option>
                            <option value ='1'>{{awtTrans('متصل')}} </option>
                            <option value ='0'>{{awtTrans('غير متصل')}} </option>
                    </select>
                </div>
            </div>
       @endslot
    @endEditModel
    @ShowModel
        @slot('ShowModelContent')

            <div class="form-group col-sm-12 col-md-12 mw-100">
                <div class="text-center">
                    <div class="images-upload-block">
                        <label class="upload-img">
                            <input type="file" accept="image/*" class="image-uploader" name="avatar" >
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </label>
                        <div class="upload-area">
                            <div class="uploaded-block" data-count-order="0">
                                <img src=""  href="{{url('public/images/users/')}}" class="avatar">
                            </div>
                        </div>
                        <div class="upload-area"></div>
                        <h5>{{awtTrans('الصوره الشخصيه ')}}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-1" class="control-label">{{awtTrans('الاسم')}}</label>
                    <input type="text" autocomplete="nope" name="name" id="" required class="form-control name" placeholder="{{awtTrans('اوامر الشبكة')}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-2" class="control-label">{{awtTrans('رقم الهاتف')}}</label>
                    <input type="number" autocomplete="nope" name="phone" id="" required class="form-control phone" placeholder="05011000000">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('كلمة السر')}}</label>
                    <input type="password" autocomplete="nope" name="" required class="form-control password">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('الحاله')}}</label>
                    <select name="active" id="" required class="form-control active">
                            <option value>{{awtTrans('اختر الحاله')}} </option>
                            <option value ='1'>{{awtTrans('متصل')}} </option>
                            <option value ='0'>{{awtTrans('غير متصل')}} </option>
                    </select>
                </div>
            </div>
        @endslot
    @endShowModel
    @DeleteAllModel @endDeleteAllModel
    @DeleteModel @endDeleteModel
    @Scripts @endScripts
@endsection


