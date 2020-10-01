@extends('dashboard.layouts.loginapp')
    @section('title')
        تسجيل دخول
    @endsection
        @section('content')
            <div class="block_login" style="background-image: {{'url("'.url('public/images/site/loginBg.png').'")'}}">
                <div class="overLay"></div>
                    <div class="login-content animated slideInUpTiny animation-duration-3">
                        <div class="login-header">
                            <a class="site-logo" href="javascript:void(0)" title="Jambo">
                                <img src="{{url('public/images/site/logo.png')}}" alt="jambo" title="jambo">
                            </a>
                        </div>
                        <div class="login-form">
                            <form class="needs-validation" method="post" action="{{route('login')}}" >
                                {{csrf_field()}}
                                <fieldset>
                                    <div class="form_group">
                                        <input  type="email"  class="{{session()->has('error_email') ? 'border-danger' : ''}}" name="email" id="email"  value="{{old('email')}}"  placeholder="{{ trans('site.email') }}" required>
                                        @if(session()->has('error_email'))
                                            <small class="form-text text-danger"> {{awtTrans('تأكد من البريد الالكتروني')}}</small>
                                        @endif

                                    </div>
                                    <div class="form_group">
                                        <input type="password" name="password" id="password" class=" {{session()->has('error_password') ? 'border-danger' : ''}}" placeholder="{{ trans('site.password') }}" required>
                                        @if(session()->has('error_password'))
                                            <small class="form-text  text-danger"> {{awtTrans('تأكد من كلمه السر')}}</small>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn_button btn_primary">{{awtTrans('تسجيل دخول')}}</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
        @endsection
    @section('script')
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>

    @endsection
