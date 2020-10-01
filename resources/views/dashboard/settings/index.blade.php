@extends('dashboard.layouts.app')
@section('title') {{awtTrans('الإعدادات')}} @endsection
@section('content')

    <div class="gx-card">
        <div class="gx-card-body tabs-container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link tap_click home"  data-id="home"  data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true">{{awtTrans('إعدادات التطبيق')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tap_click about" data-id="about"  data-toggle="tab" href="#about" role="tab"
                       aria-controls="profile" aria-selected="true">{{awtTrans('عن التطبيق')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tap_click terms" data-id="terms"  data-toggle="tab" href="#terms" role="tab"
                       aria-controls="profile" aria-selected="true">{{awtTrans('الشروط والاحكام ')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tap_click sms" data-id="sms"  data-toggle="tab" href="#sms" role="tab"
                       aria-controls="profile" aria-selected="true">{{awtTrans('بيانات باقه الرسائل')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tap_click social" data-id="social"  data-toggle="tab" href="#social" role="tab"
                       aria-controls="profile" aria-selected="true">{{awtTrans('مواقع التواصل')}}
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane">
                    <div class="card-body">
                        <form class="form-horizontal gx-card" role="form" enctype="multipart/form-data" method="post" action="{{route('sitesetting')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label" for="name_ar">{{awtTrans('اسم التطبيق')}}</label>
                                <div>
                                    <input required type="text" id="example-email" value="{{settings('name_ar')}}" name="name_ar" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name_en">{{awtTrans('اسم التطبيق بالانجليزيه')}} </label>
                                <div>
                                    <input required type="text" id="example-email" value="{{settings('name_en')}}" name="name_en" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="name_ar">{{awtTrans('البريد الالكتروني')}}</label>
                                <div>
                                    <input required type="text" id="example-email" value="{{settings('email')}}" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="phone">{{awtTrans('الهاتف')}} </label>
                                <div>
                                    <input required type="text" id="example-email" value="{{settings('phone')}}" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="phone">{{awtTrans('رقم الواتس')}} </label>
                                <div>
                                    <input required type="text" id="example-email" value="{{settings('whatsapp')}}" name="whatsapp" class="form-control">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6 mw-100">
                                    <div class="text-center">
                                        <div class="images-upload-block">
                                            <label class="upload-img">
                                                <input type="file" accept="image/*" class="image-uploader" name="site_logo" >
                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                            </label>
                                            <div class="upload-area">
                                                <div class="uploaded-block" data-count-order="0">
                                                    <img src="{{url('public/images/site/logo.png')}}">
                                                    <button class="close">×</button>
                                                </div>
                                            </div>
                                            <div class="upload-area"></div>
                                            <h5>{{awtTrans('لوجو الموقع')}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6 mw-100">
                                    <div class="text-center">
                                        <div class="images-upload-block">
                                            <label class="upload-img">
                                                <input type="file" accept="image/*" class="image-uploader" name="favicon" >
                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                            </label>
                                            <div class="upload-area">
                                                <div class="uploaded-block" data-count-order="0">
                                                    <img src="{{url('public/images/site/fav.png')}}">
                                                    <button class="close">×</button>
                                                </div>
                                            </div>
                                            <div class="upload-area"></div>
                                            <h5>{{awtTrans('Fav Icon')}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6 mw-100">
                                    <div class="text-center">
                                        <div class="images-upload-block">
                                            <label class="upload-img">
                                                <input type="file" accept="image/*" class="image-uploader" name="loginBg" >
                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                            </label>
                                            <div class="upload-area">
                                                <div class="uploaded-block" data-count-order="0">
                                                    <img src="{{url('public/images/site/loginBg.png')}}">
                                                    <button class="close">×</button>
                                                </div>
                                            </div>
                                            <div class="upload-area"></div>
                                            <h5>{{awtTrans('خلفيه صفحه تسجيل الدخول')}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6 mw-100">
                                    <div class="text-center">
                                        <div class="images-upload-block">
                                            <label class="upload-img">
                                                <input type="file" accept="image/*" class="image-uploader" name="default" >
                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                            </label>
                                            <div class="upload-area">
                                                <div class="uploaded-block" data-count-order="0">
                                                    <img src="{{url('public/images/users/default.png')}}">
                                                    <button class="close">×</button>
                                                </div>
                                            </div>
                                            <div class="upload-area"></div>
                                            <h5>{{awtTrans('صوره المستخدم')}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">{{awtTrans('حفظ')}}</button>
                        </form>
                    </div>
                </div>
                <div id="about" class="tab-pane">
                    <div class="card-body">
                        <form class="form-horizontal gx-card" role="form" enctype="multipart/form-data" method="post" action="{{route('sitesetting')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label" for="example-email">{{awtTrans('عن التطبيق')}} </label>
                                <div>
                                    <textarea name="about_ar" id="" required cols="30" rows="10" class="form-control">{{settings('about_ar')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="example-email">{{awtTrans('عن التطبيق بالانجليزيه')}} </label>
                                <div>
                                    <textarea name="about_en" id="" required cols="30" rows="10" class="form-control">{{settings('about_en')}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">{{awtTrans('حفظ')}}</button>
                        </form>
                    </div>
                </div>
                <div id="terms" class="tab-pane">
                    <div class="card-body">
                        <form class="form-horizontal gx-card" role="form" enctype="multipart/form-data" method="post" action="{{route('sitesetting')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label" for="example-email">{{awtTrans('الشروط والاحكام ')}} </label>
                                <div>
                                    <textarea name="terms_ar" id="" required cols="30" rows="10" class="form-control">{{settings('terms_ar')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="example-email">{{awtTrans('الشروط والاحكام بالانجليزيه')}} </label>
                                <div>
                                    <textarea name="terms_en" id="" required cols="30" rows="10" class="form-control">{{settings('terms_en')}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">{{awtTrans('حفظ')}}</button>
                        </form>
                    </div>
                </div>
                <div id="sms" class="tab-pane">
                    <div class="card-body">
                        <form class="form-horizontal gx-card" role="form" enctype="multipart/form-data" method="post" action="{{route('sitesetting')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label" for="example-email"> {{awtTrans('رقم الهاتف')}} </label>
                                <div>
                                    <textarea name="sms_number" id="" required cols="30" rows="10" class="form-control">{{settings('sms_number')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="example-email">{{awtTrans('كلمه السر')}} </label>
                                <div>
                                    <textarea name="sms_password" id="" required cols="30" rows="10" class="form-control">{{settings('sms_password')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="example-email">{{awtTrans('اسم المرسل')}} </label>
                                <div>
                                    <textarea name="sms_sender_name" id="" required cols="30" rows="10" class="form-control">{{settings('sms_sender_name')}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">{{awtTrans('حفظ')}}</button>
                        </form>
                    </div>
                </div>
                <div id="social" class="tab-pane">
                    <div class="card-body">
                        <div class="row gx-card">
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="button" class="btn_button btn_primary" id="openSocialForm">{{awtTrans('اضافة')}}</button>
                                    <div class="col-md-12">
                                        <div class="panel panel-custom panel-border">
                                            <div class="panel-heading">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-striped m-0 table_social">
                                                                <thead>
                                                                <tr>
                                                                    <th>{{awtTrans('الشعار')}}</th>
                                                                    <th>{{awtTrans('اسم الموقع')}}</th>
                                                                    <th>{{awtTrans('الرابط')}}</th>
                                                                    <th>{{awtTrans('التحكم')}}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr id="addSocial" class="hidden">
                                                                    <form action="{{route('add-social')}}" method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <td>
                                                                            <input required type="file" name="icon" class="form-control" style="width: 189px;margin: auto;padding-top: 12px;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" minlength="2" type="text" name="site_name" placeholder="Facebook" class="form-control" style="width: 189px;margin: auto;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" minlength="2" type="link" name="url" placeholder="www.facebook.com" class="form-control" style="width: 189px;margin: auto;">
                                                                        </td>
                                                                        <td>
                                                                            <div class="btn_setting">
                                                                                <button type="submit"><i class="fa fa-save"></i></button>
                                                                                <button type="button" id="cancel"><i class="fa fa-close"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </form>
                                                                </tr>
                                                                <tr id="editSocial" class="hidden">
                                                                    <form action="{{route('update-social')}}" method="post" enctype="multipart/form-data">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="id" value="">
                                                                        <td>
                                                                            <input  type="file" name="edit_icon" class="form-control" style="width: 189px;margin: auto;padding-top: 12px;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" value="" minlength="2" type="text" name="edit_name" placeholder="Facebook" class="form-control" style="width: 189px;margin: auto;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" value="" minlength="2" type="link" name="edit_url" placeholder="www.facebook.com" class="form-control" style="width: 189px;margin: auto;">
                                                                        </td>
                                                                        <td>
                                                                            <div class="btn_setting">
                                                                                <button type="submit"><i class="fa fa-save"></i></button>
                                                                                <button type="button" id="cancelEdit"><i class="fa fa-close"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </form>
                                                                </tr>
                                                                @foreach($socials as $social)
                                                                    <tr>
                                                                        <th scope="row">
                                                                            <a target="_blank" href="{{$social->url}}" class="btn-{{$social->icon}} btn-small">
                                                                                <img src="{{ Request::root() }}/public/images/socials/{{ $social->icon }}" alt="" style="height: 30px;width: 30px; border-radius: 50%;">
                                                                            </a>
                                                                        </th>
                                                                        <td>{{$social->site_name}}</td>
                                                                        <td>{{$social->url}}</td>
                                                                        <td>
                                                                            <div class="btn_setting">
                                                                                <button type="button" class="editSocialForm"
                                                                                        data-id     = "{{$social->id}}"
                                                                                        data-name   = "{{$social->site_name}}"
                                                                                        data-ics    = "{{$social->icon}}"
                                                                                        data-url    = "{{$social->url}}"><i class="fa fa-edit"></i></button>
                                                                                <a href="{{route('delete-social', $social->id )}}"><i class="fa fa-trash"></i></a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        var active =  localStorage.getItem('active_tap')
        if(active != null){
            $('#'+active).addClass('active')
            $('.'+active).addClass('active')
        }else{
            $('#home').addClass('active')
            $('.home').addClass('active')
        }

        $(".tap_click").on('click', function () {
            var id =  $(this).data('id');
            localStorage.setItem('active_tap', id)
        });

        $("#openSocialForm").on('click', function () {
            $(this).attr('disabled', 'disabled');
            $("#addSocial").removeClass('hidden');
        });

        $("#cancel").on('click', function () {
            $('#openSocialForm').removeAttr('disabled');
            $("#addSocial").addClass('hidden');
        });

        $(".editSocialForm").on('click', function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            // let icon = $(this).data('ics');
            let url = $(this).data('url');

            $("input[name='id']").val(id);
            $("input[name='edit_name']").val(name);
            // $("input[name='edit_icon']").val(icon);
            $("input[name='edit_url']").val(url);

            $("#editSocial").removeClass('hidden');
        });

        $("#cancelEdit").on('click', function () {
            $("#editSocial").addClass('hidden');
        });

    </script>
@endsection
