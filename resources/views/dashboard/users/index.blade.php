@extends('dashboard.layouts.app')
@section('title'){{awtTrans($pluralName)}}@endsection
@section('content')
    <div class="gx-card">
        @Reload @endReload
        @DeleteAll @endAddButton
        @AddButton @endAddButton
        <a class="gx-btn gx-btn-dark btn-info" type="button" data-toggle="modal" data-target="#exampleModal3">
            <i class="icon-station"></i>
            <span>
                <i class="fa fa-envelope" aria-hidden="true" style="margin: 4px"></i>مراسلة الاعضاء
            </span>
        </a>
    </div>

    <div class="gx-card Block_Up">
        @if($users->count())
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
                    <th>{{awtTrans('مراسله')}} </th>
                    <th>{{awtTrans('حذف')}} </th>

                @endslot

                @slot('tableBody')
                    @foreach($users as $row)
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
                        <td>
                            <a href="#"
                               data-toggle="modal"
                               data-target="#exampleModal4"
                               class="contactUser"
                               data-id = "{{$row->id}}"
                               data-name = "{{$row->name}}"
{{--                           data-device_id = "{{$row->device_id}}"--}}
                               data-phone = "{{$row->phone}}"
                               data-email = "{{$row->email}}">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </a>


                        </td>
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

    <!-- correspondent for all users Modal -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">مراسلة جميع الاعضاء</h5>
                </div>
                <div class="modal-body">
                    <div class="user_inbox_tabs">
                        <div class="tabbable">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                {{-- <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ايميل</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">رساله SMS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">اشعار</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                {{-- <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="block_over_thing">
                                        <form action="{{route('emailallusers')}}" method="POST" enctype="multipart/form-data" style="width: 100%;text-align: center;">
                                            {{csrf_field()}}
                                            <div class="col-md-12">
                                                <textarea rows="15" name="message" class="form-control" placeholder="نص رسالة الـ Email "></textarea>
                                            </div>

                                            <div class="col-sm-12" style="margin-top: 10px">
                                                <button type="submit" class="btn btn-primary addCategory">ارسال</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}
                                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="block_over_thing ">
                                        <form action="{{route('smsallusers')}}" method="POST" enctype="multipart/form-data" style="width: 100%;text-align: center;">
                                            {{csrf_field()}}
                                            <div class="col-sm-12">
                                                <textarea rows="15" name="message" class="form-control" placeholder="نص رسالة الـ SMS "></textarea>
                                            </div>

                                            <div class="col-sm-12" style="margin-top: 10px">
                                                <button type="submit" class="btn btn-primary addCategory">ارسال</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="block_over_thing">
                                        <form action="{{route('notificationallusers')}}" method="POST" enctype="multipart/form-data" style="width: 100%;text-align: center;">
                                            {{csrf_field()}}
                                            <div class="col-sm-12">
                                                <textarea rows="15" name="message" class="form-control" placeholder="نص رسالة الـ Notification "></textarea>
                                            </div>

                                            <div class="col-sm-12" style="margin-top: 10px">
                                                <button type="submit" class="btn btn-primary addCategory">ارسال</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /correspondent for all users Modal -->

    <!-- correspondent for one users Modal -->
    <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">مراسلة</h5>
                </div>
                <div class="modal-body">
                    <div class="user_inbox_tabs">
                        <div class="tabbable">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                {{-- <li class="nav-item">
                                    <a class="nav-link active" id="mail-tab" data-toggle="tab" href="#mail" role="tab" aria-controls="mail" aria-selected="true">ايميل</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" id="sms-tab" data-toggle="tab" href="#sms" role="tab" aria-controls="sms" aria-selected="false">رساله SMS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="notification-tab" data-toggle="tab" href="#notification" role="tab" aria-controls="notification" aria-selected="false">اشعار</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                {{-- <div class="tab-pane fade show active" id="mail" role="tabpanel" aria-labelledby="mail-tab">
                                    <div class="block_over_thing">
                                        <form action="{{route('emailSingleUser')}}" method="POST" enctype="multipart/form-data" style="width: 100%;text-align: center;">
                                            {{csrf_field()}}
                                            <input type="hidden" name="email" value="">
                                            <div class="col-md-12">
                                                <textarea rows="15" name="email_message" class="form-control" placeholder="نص رسالة الـ Email "></textarea>
                                            </div>

                                            <div class="col-sm-12" style="margin-top: 10px">
                                                <button type="submit" class="btn btn-primary addCategory">ارسال</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}
                                <div class="tab-pane fade show active" id="sms" role="tabpanel" aria-labelledby="sms-tab">
                                    <div class="block_over_thing">
                                        <form action="{{route('smsSingleUser')}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <input type="hidden" name="phone" value="">
                                            <div class="col-sm-12">
                                                <textarea rows="15" name="sms_message" class="form-control" placeholder="نص رسالة الـ SMS "></textarea>
                                            </div>

                                            <div class="col-sm-12" style="margin-top: 10px">
                                                <button type="submit" class="btn btn-primary addCategory">ارسال</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                                    <div class="block_over_thing">
                                        <form action="{{route('notificationSingleUser')}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <input type="hidden" name="device_id" value="">
                                            <input type="hidden" name="id" value="">
                                            <div class="col-sm-12">
                                                <textarea rows="15" name="sms_message" class="form-control" placeholder="نص رسالة الـ Notification "></textarea>
                                            </div>

                                            <div class="col-sm-12" style="margin-top: 10px">
                                                <button type="submit" class="btn btn-primary addCategory">ارسال</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /correspondent for one users Modal -->


    @DeleteAllModel @endDeleteAllModel
    @DeleteModel @endDeleteModel
    @Scripts @endScripts
@endsection


