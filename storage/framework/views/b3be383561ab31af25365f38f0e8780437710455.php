<?php $__env->startSection('script'); ?>
    
        <script>
            $(document).ready(function(){

                setTimeout(function () {
                    initMap(24.774265,46.738586)
                    getLocation()
                },2000)
            })

            function initMap(lat,lng){

                var latlng = new google.maps.LatLng( lat, lng);
                var map    = new google.maps.Map(document.getElementById('map'), {
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
                    document.getElementById("latitude").value  = this.getPosition().lat();
                    document.getElementById("longitude").value  = this.getPosition().lng();
                });
            }
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                initMap(position.coords.latitude,position.coords.longitude)
                document.getElementById("latitude").value  = position.coords.latitude;
                document.getElementById("longitude").value  = position.coords.longitude;
            }

        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5uC_mExFIMSehvCgsjegxcF7mTpKmI4w&callback=initMap">
        </script>
    

    
        <script>
            $(document).on('click','.edit',function(e){
                e.preventDefault();
                var data = $(this).data();
                <?php if(!isset($withRoutes)): ?>
                    $('#edit_form').attr('action', '<?php echo e($routeName); ?>/'+data.id);
                <?php else: ?>
                    var url = '<?php echo e(route("$updateRoute", ":id")); ?>';
                    url = url.replace(':id', data.id);
                $('#edit_form').attr('action',url);
                <?php endif; ?>
                $.each(data, function (key, value) {
                    var type = $('#'+key).prop("tagName");
                    if (type == 'SELECT') {
                        if ($('#'+key+'option').val() == value) {
                        $(this).addClass('selected');
                        }
                    }
                    if (type == 'TEXTAREA') {
                        $("textarea#"+key).val(value);
                    }
                    if (type == 'IMG') {
                        var src = $('#'+key).attr('href');
                        var src = src +'/'+value
                        $("#"+key).attr('src',src);
                    }
                    $(('#'+key)).val(value);
                });
            });

            $(document).on('submit','#edit_form',function(e){
                e.preventDefault();
                var url = $(this).attr('action')
                $.ajax({
                    url: url,
                    method: 'post',
                    data: new FormData($("#edit_form")[0]),
                    dataType:'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        $(".loader_div").css('display','block');
                    },
                    success: function(response){
                        toastr.success('<?php echo e(awtTrans('تمت التعديل بنجاح')); ?>')
                        setTimeout(function(){
                            $(".loader_div").css('display','none');
                            location.reload();
                        }, 1000);
                        location.reload();
                    },
                    error: function (xhr) {
                        $(".loader_div").css('display','none');
                        $('.error_meassages').remove();
                        $('#edit_form input').removeClass('border-danger')
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            $('#edit_form input[name='+key+']').addClass('border-danger')
                            $('#edit_form input[name='+key+']').after('<small class="form-text error_meassages text-danger">'+value+'</small>');
                        });
                    },
                });

            });
        </script>
    

    
    <script>
        $(document).on('click','.show-model',function(e){
            $('#show_form input').attr('disabled',true)
            $('#show_form  select').attr('disabled',true)
            $('#show_form textarea').attr('disabled',true)
            e.preventDefault();
            var data = $(this).data();
            $.each(data, function (key, value) {
                var type = $('.'+key).prop("tagName");

                if (type == 'SELECT') {
                    if ($('.'+key+'option').val() == value) {
                       $(this).addClass('selected');
                    }
                }
                if (type == 'TEXTAREA') {
                    $("textarea."+key).val(value);
                }

                if (type == 'IMG') {
                   var src = $('.'+key).attr('href');
                   var src = src +'/'+value
                    $("."+key).attr('src',src);
                }
                $(('.'+key)).val(value);
            });
        });
    </script>
    

    
    <script>
        $(document).on('click','.delete',function(e){
            let id         = $(this).data('id');
            $('#delete_id').val(id)
            <?php if(!isset($withRoutes)): ?>
                $('#delete_form').attr('action','<?php echo e(url("admin/".$routeName)); ?>'+'/'+id);
            <?php else: ?>
                var url = '<?php echo e(route("$deleteRoute", ":id")); ?>';
                url = url.replace(':id', id);
                 $('#delete_form').attr('action', url );
            <?php endif; ?>
        });

        $(document).on('submit','#delete_form',function(e){
            e.preventDefault();
            var url = $(this).attr('action');
            $.ajax({
                type: "DELETE",
                url: url,
                data: {},
                beforeSend: function(){
                    $(".loader_div").css('display','block');
                },
                success: function( msg ) {
                    $(".loader_div").css('display','none');
                    $('#delete').modal('hide');
                    toastr.error("<?php echo e(awtTrans('تم الحذف بنجاح')); ?>")
                    var id = $('#delete_id').val();
                    $('#hide_on_delete_'+id).hide();
                }
            });
        });
    </script>
    

    
    <script>
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
            if (usersIds.length > 0) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    <?php if(!isset($withRoutes)): ?>
                       url: "<?php echo e(url('admin/'.$routeName.'/deleteAll')); ?>",
                    <?php else: ?>
                       url: "<?php echo e(route($deleteAllRoute)); ?>",
                    <?php endif; ?>
                    data: {data: requestData, _token: '<?php echo e(csrf_token()); ?>'},
                    beforeSend: function(){
                        $(".loader_div").css('display','block');
                    },
                    success: function( msg ) {
                        $(".loader_div").css('display','none');
                        if (msg == 'success') {
                            $('#deleteAll').modal('hide');
                            toastr.error("<?php echo e(awtTrans('تم الحذف بنجاح')); ?>")
                            $('.checkSingle:checked').each(function () {
                                var id2 = $(this).attr('id');
                                $('#hide_on_delete_'+id2).hide();
                            });
                        }
                    }
                });
            }
        });
    </script>
    

    
    <script>
        $(document).ready(function(){
            $(document).on('submit','#add_form_submit',function(e){
                e.preventDefault();
                var url = $(this).attr('action')
                $.ajax({
                    url: url,
                    method: 'post',
                    data: new FormData($("#add_form_submit")[0]),
                    dataType:'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        $(".loader_div").css('display','block');
                    },
                    success: function(response){
                        toastr.success('<?php echo e(awtTrans('تمت الاضافه بنجاح')); ?>')
                        setTimeout(function(){
                            $(".loader_div").css('display','none');
                        }, 1000);
                            location.reload();
                    },
                    error: function (xhr) {
                        $(".loader_div").css('display','none');
                        $('.error_meassages').remove();
                        $('#add_form_submit input').removeClass('border-danger')
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            $('#add_form_submit input[name='+key+']').addClass('border-danger')
                            $('#add_form_submit input[name='+key+']').after('<small class="form-text error_meassages text-danger">'+value+'</small>');
                        });
                    },
                });

            });
        });
    </script>
    

    
    <?php if(isset($moreScripts)): ?>
     <?php echo e($moreScripts); ?>

    <?php endif; ?>
    

<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\newStandered\resources\views/dashboard/shared/components/scripts.blade.php ENDPATH**/ ?>