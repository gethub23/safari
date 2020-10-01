@section('title')
    {{$PluralName}}
@endsection

    <a href="#add" class="btn btn-success waves-effect btn-lg waves-light m-b-10" data-animation="fadein" data-plugin="custommodal"
        data-overlaySpeed="100" data-overlayColor="#36404a">{{awtTrans('اضافة')}} {{awtTrans($singleName)}} <i class="fa fa-plus"></i> </a>
    <a href="#deleteAll" class="btn btn-danger waves-effect btn-lg waves-light delete-all m-b-10"  data-animation="blur" data-plugin="custommodal"
        data-overlaySpeed="100" data-overlayColor="#36404a">{{awtTrans('حذف المحدد')}} <i class="fa fa-trash"></i> </a>
    <a class="btn btn-primary waves-effect btn-lg waves-light m-b-10" onclick="window.location.reload()" role="button">{{awtTrans('تحديث الصفحة')}} <i class="fa fa-refresh"></i> </a>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive boxes">
            <table id="datatable" class="table table-bordered table-responsives">
                <thead>
                <tr>
                    <th>
                        <label class="custom-control material-checkbox" style="margin: auto">
                            <input type="checkbox" class="material-control-input" id="checkedAll">
                            <span class="material-control-indicator"></span>
                        </label>
                    </th>
                    <th>{{awtTrans('الصورة')}}</th>
                    <th>{{awtTrans('الاسم')}}</th>
                    <th>{{awtTrans('البريد')}}</th>
                    <th>{{awtTrans('رقم الهاتف')}}</th>
                    <th> {{awtTrans('العنوان')}}</th>
                    <th>{{awtTrans('الحالة')}}</th>
                    <th>{{awtTrans('التاريخ')}}</th>
                    <th>{{awtTrans('التحكم')}}</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($users as $user)
                    <tr>
                        <td>
                            <label class="custom-control material-checkbox" style="margin: auto">
                                <input type="checkbox" class="material-control-input checkSingle" id="{{$user->id}}">
                                <span class="material-control-indicator"></span>
                            </label>
                        </td>
                        <td><img src="{{appPath()}}/images/users/{{$user->avatar}}" alt="user-img" width="60px" title="Mat Helme" class="img-circle img-thumbnail img-responsive"></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>
                            @if($user->active == 0)
                                <span class="label label-danger">{{awtTrans('غير متصل')}}</span>
                            @else
                                <span class="label label-success">{{awtTrans('متصل')}}</span>
                            @endif
                        </td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="#edit" class="edit btn btn-success" data-animation="fadein" data-plugin="custommodal"
                                    data-overlaySpeed="100" data-overlayColor="#36404a"
                                    data-id = "{{$user->id}}"
                                    data-phone = "{{$user->phone}}"
                                    data-name = "{{$user->name}}"
                                    data-email = "{{$user->email}}"
                                    data-photo = "{{$user->avatar}}"
                                    
                                    data-lng = "{{$user->lng}}">
                                    <i class="fa fa-cogs"></i>
                                </a>
                                <a href="#delete" class="delete btn btn-danger" data-animation="blur" data-plugin="custommodal"
                                    data-overlaySpeed="100" data-overlayColor="#36404a"
                                    data-id = "{{$user->id}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- end col -->
</div>

<!-- add user modal -->
<div id="add" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();" style="opacity: 1">
        <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
    </button>
    <h4 class="custom-modal-title" style="background-color: #36404a">
         {{awtTrans('اضافه')}} {{awtTrans($singleName)}}
    </h4>
    <form action="{{ url('admin/users') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-1" class="control-label">{{awtTrans('الاسم')}}</label>
                        <input type="text" autocomplete="nope" name="name" required class="form-control" placeholder="{{awtTrans('اوامر الشبكة')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-2" class="control-label">{{awtTrans('رقم الهاتف')}}</label>
                        <input type="text" autocomplete="nope" name="phone" required class="form-control phone" placeholder="05011000000">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-3" class="control-label">{{awtTrans('البريد الالكتروني')}}</label>
                        <input type="email" autocomplete="nope" name="email" required class="form-control" placeholder="email@exmaple.com">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-3" class="control-label">{{awtTrans('كلمة السر')}}</label>
                        <input type="password" autocomplete="nope" name="password" required class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-3" class="control-label">{{awtTrans('العنوان')}}</label>
                        <input type="text" autocomplete="nope" name="address" required class="form-control">
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-4 control-label">{{awtTrans('الصورة الشخصية')}}</label>
                            <input type="file" name="avatar" class="dropify" data-max-file-size="1M">
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="row" style="margin-top: 15px">--}}
                {{--<div>--}}
                    {{--<span class="col-sm-4 control-label" style="margin-bottom: 10px">تحديد الموقع</span>--}}
                    {{--<div class="col-sm-12">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="map" style="height: 400px; margin-top: 20px" id="map"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        <input type="hidden" name="lat">
        <input type="hidden" name="lng">
        <div class="modal-footer">
            <button type="submit" class="btn btn-success waves-effect waves-light">{{awtTrans('اضافة')}}</button>
            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" onclick="Custombox.close();">{{awtTrans('رجوع')}}</button>
        </div>
    </form>
</div>

<!-- edit user modal -->
<div id="edit" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();" style="opacity: 1">
        <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
    </button>
    <h4 class="custom-modal-title" style="background-color: #36404a">
        {{awtTrans('تعديل')}} <span id="username"></span>
    </h4>
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data" id="updat_form">
        {{csrf_field()}}
        @method('PUT')
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-1" class="control-label">{{awtTrans('الاسم')}}</label>
                        <input type="text" autocomplete="nope" name="edit_name" value="" required class="form-control" placeholder="{{awtTrans('اوامر الشبكة')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-2" class="control-label">{{awtTrans('رقم الهاتف')}}</label>
                        <input type="text" autocomplete="nope" name="edit_phone" value="" required class="phone form-control" id="phone" placeholder="05011000000">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-3" class="control-label">{{awtTrans('البريد الالكتروني')}}</label>
                        <input type="email" autocomplete="nope" name="edit_email" value="" required class="form-control" placeholder="email@exmaple.com">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-3" class="control-label">{{awtTrans('كلمة السر')}}</label>
                        <input type="password" autocomplete="nope" name="password" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-4 control-label">{{awtTrans('الصورة الشخصية')}}</label>
                            <input type="file" name="avatar" class="dropify" data-max-file-size="1M">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="row" style="margin-top: 15px">--}}
            {{--<div>--}}
                {{--<span class="col-sm-4 control-label" style="margin-bottom: 10px">تحديد الموقع</span>--}}
                {{--<div class="col-sm-12">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<div class="map" style="height: 400px; margin-top: 20px" id="editMap"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <input type="hidden" name="edit_lat">
        <input type="hidden" name="edit_lng">
        <div class="modal-footer">
            <button type="submit" class="btn btn-success waves-effect waves-light">{{awtTrans('تعديل')}}</button>
            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" onclick="Custombox.close();">{{awtTrans('رجوع')}}</button>
        </div>
    </form>
</div>

<div id="delete" class="modal-demo" style="position:relative; right: 32%">
    <button type="button" class="close" onclick="Custombox.close();" style="opacity: 1">
        <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
    </button>
    <h4 class="custom-modal-title">{{awtTrans('حذف')}} {{awtTrans('$singleName')}}</h4>
    <div class="custombox-modal-container" style="width: 400px !important; height: 160px;">
        <div class="row">
            <div class="col-sm-12">
                <h3 style="margin-top: 35px">
                    {{awtTrans('هل تريد مواصلة عملية الحذف ؟')}}
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="" method="post" id="delete_form">
                    {{csrf_field()}}
                    @method('delete')
                    <button style="margin-top: 35px" type="submit" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5" style="margin-top: 19px">{{awtTrans('هل تريد مواصلة عملية الحذف ؟')}}</button>
                </form>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div>

<div id="deleteAll" class="modal-demo" style="position:relative; right: 32%">
    <button type="button" class="close" onclick="Custombox.close();" style="opacity: 1">
        <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
    </button>
    <h4 class="custom-modal-title">{{awtTrans('حذف')}} {{awtTrans($PluralName)}}</h4>
    <div class="custombox-modal-container" style="width: 400px !important; height: 160px;">
        <div class="row">
            <div class="col-sm-12">
                <h3 style="margin-top: 35px">
                    {{awtTrans('هل تريد مواصلة عملية الحذف ؟')}}
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button style="margin-top: 35px" type="submit" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 send-delete-all" style="margin-top: 19px">{{awtTrans('حـذف')}}</button>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div>

@endsection

@section('script')
{{-- Maps --}}
<script>
    var map;
    var editMap;
    var currentLocation;
    var markers = [];
    var editMarkers = [];
    function initMap() {
        var haightAshbury = {lat: 31.043956282336183, lng: 31.38311851319736};

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: haightAshbury,
            mapTypeId: 'terrain'
        });

        editMap = new google.maps.Map(document.getElementById('editMap'), {
            zoom: 4,
            center: haightAshbury,
            mapTypeId: 'terrain'
        });

        editMap.addListener('click', function(event) {
            deleteEditMarkers();
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            $("input[name='edit_lat']").val(lat);
            $("input[name='edit_lng']").val(lng);
            addEditMarker(event.latLng);
        });

        // This event listener will call addMarker() when the map is clicked.
        map.addListener('click', function(event) {
            deleteMarkers();
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            $("input[name='lat']").val(lat);
            $("input[name='lng']").val(lng);
            addMarker(event.latLng);
        });

    }

    function addEditMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: editMap
        });
        editMarkers.push(marker);
    }

    function setEditMapOnAll(map) {
        for (var i = 0; i < editMarkers.length; i++) {
            editMarkers[i].setMap(map);
        }
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearEditMarkers() {
        setEditMapOnAll(null);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteEditMarkers() {
        clearEditMarkers();
        editMarkers = [];
    }

    function addMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
        markers.push(marker);
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

</script>
<script>
    $('.edit').on('click',function() {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let photo = $(this).data('photo');
        let phone = $(this).data('phone');
        let email = $(this).data('email');
        let lat = $(this).data('lat');
        let lng = $(this).data('lng');
        currentLocation = {lat: lat, lng: lng};
        addEditMarker(currentLocation);

        $('#updat_form').attr('action','{{url("admin/".$routeName)}}'+'/'+id);
        $("input[name='edit_name']").val(name);
        $("input[name='edit_phone']").val(phone);
        $("input[name='edit_lat']").val(lat);
        $("input[name='edit_lng']").val(lng);
        $("input[name='edit_email']").val(email);
        let link = "{{asset('images/users/')}}" + '/' + photo;
        $('.photo').attr('data-default-file', link);
        $("#username").html(name);
    });

    $('.delete').on('click',function(){
        let id         = $(this).data('id');
        $('#delete_form').attr('action','{{url("admin/".$routeName)}}'+'/'+id);
    });

    $("#checkedAll").change(function(){
        if(this.checked){
            $(".checkSingle").each(function(){
                this.checked=true;
            })
        }else{
            $(".checkSingle").each(function(){
                this.checked=false;
            })
        }
    });

    $(".checkSingle").click(function () {
        if ($(this).is(":checked")){
            var isAllChecked = 0;
            $(".checkSingle").each(function(){
                if(!this.checked)
                    isAllChecked = 1;
            })
            if(isAllChecked == 0){ $("#checkedAll").prop("checked", true); }
        }else {
            $("#checkedAll").prop("checked", false);
        }
    });

    $('.send-delete-all').on('click', function (e) {
        var usersIds = [];
        $('.checkSingle:checked').each(function () {
            var id = $(this).attr('id');
            usersIds.push({
                id: id,
            });
        });
        var requestData = JSON.stringify(usersIds);
        // console.log(requestData);
        if (usersIds.length > 0) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{url('admin/'.$routeName.'/deleteAll')}}",
                data: {data: requestData, _token: '{{csrf_token()}}'},
                success: function( msg ) {
                    if (msg == 'success') {
                        location.reload()
                    }
                }
            });
        }
    });
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5Xz9rMq52xAtXTjm6v_cMeppcxWnm0-M&callback=initMap"></script>
