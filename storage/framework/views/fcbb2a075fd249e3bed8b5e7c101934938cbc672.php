





















































































<!-- /Right Sidebar-->
<div class="menu-backdrop fade"></div>
<!-- /menu backdrop -->

<!--Load JQuery-->
<script src="<?php echo e(url('/public/design/admin/node_modules/jquery/dist/jquery.min.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/node_modules/bigslide/dist/bigSlide.min.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/functions.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/node_modules/chartist/dist/chartist.min.js')); ?>"></script>

<script src="<?php echo e(url('/public/design/admin/node_modules/d3/d3.min.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/node_modules/c3/c3.min.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/bootstrap-editable.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/bootstrap-table.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/bootstrap-table-editable.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/bootstrap-table-export.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/bootstrap-table-resizable.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/colResizable-1.5.source.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/data-table-active.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/tableExport.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/node_modules/datatables.net/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/custom/data-tables.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/node_modules/moment/moment.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/node_modules/bootstrap4-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/node_modules/select2/dist/js/select2.full.min.js')); ?>"></script>


<script src="<?php echo e(url('/public/design/admin/js/notify.min.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/custom/notifications.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/toastr.min.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/node_modules/dropzone/dist/dropzone.js')); ?>"></script>

<script src="<?php echo e(url('/public/design/admin/node_modules/bootstrap4-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script src="<?php echo e(url('/public/design/admin/js/custom/datetime-pickers.js')); ?>"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-messaging.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-firestore.js"></script>

<script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyDMoROdr136Xb7SbR7wkpZWtVsq3ixeAG8",
        authDomain: "dashboard-e1277.firebaseapp.com",
        databaseURL: "https://dashboard-e1277.firebaseio.com",
        projectId: "dashboard-e1277",
        storageBucket: "dashboard-e1277.appspot.com",
        messagingSenderId: "1040978938175",
        appId: "1:1040978938175:web:fb53515b9ca851f02a6b8a",
        measurementId: "G-RBFMGHRFNH"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            console.log('Notification permission granted.');
        } else {
            console.log('Unable to get permission to notify.');
        }
    });


    const messaging      = firebase.messaging();

    messaging.onMessage((payload) => {
        console.log('Message received. ', payload);

        var data    = JSON.parse(payload['data']['data']);
        let room    = data['room'];
        let message = data['message'];
        let time    = data['time'];
        let type    = data['type'];
        

        if(type=='message'){

        $('#'+room).append(
            '<div class="d-flex flex-nowrap chat-item">' +
            '   <div class="bubble">' +
            '       <div class="message">'+message+'</div>' +
            '       <div class="time">'+time+'</div>' +
            '   </div>' +
            '</div>');

        }
    });



    <?php if(Route::currentRouteName()=='loginForm'): ?>
        messaging.getToken().then((currentToken) => {
            if (currentToken) {
                console.log(currentToken);
                localStorage.setItem('web_token', currentToken);
                document.cookie = "web_token="+currentToken;
            } else {
                console.log('No Instance ID token available. Request permission to generate one.');
            }
        }).catch((err) => {
            console.log('An error occurred while retrieving token. ', err);
        });
    <?php endif; ?>


</script>
<?php echo $__env->yieldContent('script'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\app\resources\views/dashboard/layouts/footer.blade.php ENDPATH**/ ?>