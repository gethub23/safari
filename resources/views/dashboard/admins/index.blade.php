@extends('dashboard.layouts.app')
@section('title'){{awtTrans($pluralName)}}@endsection
@section('content')
    <div class="gx-card">
        @Reload @endReload
        @DeleteAll @endAddButton
        @AddButton @endAddButton
    </div>
    <div class="gx-card Block_Up">
        @if($admins->count())
            @Table
                @slot('tableHead')
                    <th>
                        <div class="form-checkbox">
                            <input type="checkbox" value="value1" name="name1" id="checkedAll">
                            <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                        </div>
                    </th>
                    <th>{{awtTrans('الصورة')}} </th>
                    <th>{{awtTrans('الاسم')}}</th>
                    <th>{{awtTrans('البريد')}}</th>
                    <th>{{awtTrans('رقم الهاتف')}}</th>
                    <th>{{awtTrans('الصلاحيه')}}</th>
                    <th>{{awtTrans('التاريخ')}}</th>
                    <th>{{awtTrans('تعديل')}} </th>
                    <th>{{awtTrans('عرض')}} </th>
                    <th>{{awtTrans('حذف')}} </th>
                @endslot

                @slot('tableBody')
                    @foreach($admins as $row)
                        <tr id="hide_on_delete_{{$row->id}}">
                            <td class="text-center">
                                <div class="form-checkbox">
                                    <input type="checkbox" class="checkSingle" id="{{$row->id}}">
                                    <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                                </div>
                            </td>
                            <td><img src="{{imageUrl('users',$row->avatar)}}" alt="row-img" width="60px" title="Mat Helme" class="img-circle img-thumbnail img-responsive"></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->Role->role}}</td>
                            <td>{{$row->created_at->diffForHumans()}}</td>
                            @EditButton(['row' =>[
                                'id'            => $row->id ,
                                'name'          => $row->name ,
                                'phone'         => $row->phone ,
                                'email'         => $row->email ,
                                'role'          => $row->Role->id ,
                                'avatar'        => $row->avatar ,
                            ]])@endEditButton
                            @ShowButton(['row' =>[
                                'id'            => $row->id ,
                                'name'          => $row->name ,
                                'phone'         => $row->phone ,
                                'email'         => $row->email ,
                                'role'          => $row->Role->id ,
                                'avatar'        => $row->avatar ,
                            ]])@endShowButton
                            @if($row->id != 1)
                                @DeleteButton(['id' => $row->id]) @endDeleteButton
                            @else
                                <td></td>
                            @endif
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

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم')}}</label>
                <input type="text" name="name" id="" class="form-control" value="{{old('name')}}"  placeholder="{{awtTrans('ادخل الاسم')}}" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('رقم الهاتف')}}</label>
                <input type="text" name="phone" id="" class="form-control" value="{{old('phone')}}"  placeholder="{{awtTrans('ادخل رقم الهاتف')}}" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label">{{awtTrans('البريد الالكتروني')}}</label>
                <input type="email" name="email" id="" class="form-control" value="{{old('email')}}"  placeholder="{{awtTrans('ادخل البريد الالكتروني')}}" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label">{{awtTrans('كلمه السر')}}</label>
                <input type="password" name="password" id="" class="form-control" autocomplete="nope" required>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('الصلاحيه')}}</label>
                    <select name="role" id="" required class="form-control">
                        <option value=> {{awtTrans('اختر صلاحيه_ _')}}</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}" {{$role->id == old('role') ? 'selected' : ''}}>{{$role->role}}</option>
                        @endforeach
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

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم')}}</label>
                <input type="text" name="name" id="name" class="form-control"   placeholder="{{awtTrans('ادخل الاسم')}}" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('رقم الهاتف')}}</label>
                <input type="text" name="phone" id="phone" class="form-control"   placeholder="{{awtTrans('ادخل رقم الهاتف')}}" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label">{{awtTrans('البريد الالكتروني')}}</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="{{awtTrans('ادخل البريد الالكتروني')}}" autocomplete="nope" required>
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label">{{awtTrans('كلمه السر')}}</label>
                <input type="password" name="password" id="" class="form-control" autocomplete="nope" >
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('الصلاحيه')}}</label>
                    <select name="role" id="role" required class="form-control">
                        <option value=> {{awtTrans('اختر صلاحيه_ _')}}</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}" {{$role->id == old('role') ? 'selected' : ''}}>{{$role->role}}</option>
                        @endforeach
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

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم')}}</label>
                <input type="text" name="name" id="" class="form-control name"  autocomplete="nope" >
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('رقم الهاتف')}}</label>
                <input type="text" name="phone" id="" class="form-control phone"   autocomplete="nope" >
            </div>

            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label">{{awtTrans('البريد الالكتروني')}}</label>
                <input type="email" name="email" id="" class="form-control email"  autocomplete="nope" >
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="field-3" class="control-label">{{awtTrans('الصلاحيه')}}</label>
                    <select name="role" id=""  class="form-control role">
                        <option value=> {{awtTrans('اختر صلاحيه_ _')}}</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}" {{$role->id == old('role') ? 'selected' : ''}}>{{$role->role}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endslot
    @endShowModel
    @DeleteAllModel @endDeleteAllModel
    @DeleteModel @endDeleteModel
    @Scripts  @endScripts
@endsection
