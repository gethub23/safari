<!-- Main Header -->
<header class="main-header">
    <div class="gx-toolbar">
        <div class="sidebar-mobile-menu d-block d-lg-none">
            <a class="gx-menu-icon menu-toggle" href="#menu">
                <span class="menu-icon"></span>
            </a>
        </div>

        <!-- Sidebar header  -->
        <div class="sidebar-header">
            <div class="user-profile">
                <img class="user-avatar img_border" alt="Domnic" src="{{appPath()}}/images/users/{{auth()->user()->avatar}}">

                <div class="user-detail">
                    <h4 class="user-name">
                        <span class="dropdown">
                            <a class="dropdown-toggle user_enter" href="#" role="button" id="userAccount"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               {{auth()->user()->name}}
                            </a>

                            <span class="dropdown-menu dropdown-menu-right drop_down" aria-labelledby="userAccount">
                                <a class="dropdown-item" href="{{route('settings')}}">
                                    <i class="zmdi zmdi-settings zmdi-hc-fw mr-2"></i>
                                    {{awtTrans('الاعدادات')}}
                                </a>
                                <a class="dropdown-item" href="{{route('logout')}}">
                                    <i class="zmdi zmdi-sign-in zmdi-hc-fw mr-2"></i>
                                    {{awtTrans('تسجيل خروج')}}
                                </a>
                            </span>
                        </span>
                    </h4>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->


        <ul class="quick-menu header-notifications ml-auto">

            <li class="nav-searchbox dropdown d-inline-block ">
                @if(app()->getLocale() == 'en')
                    <a href="{{url('admin/lang/ar')}}"> <i class="zmdi zmdi-globe-alt zmdi-hc-fw"></i> العربية </a>
                @else
                    <a href="{{url('admin/lang/en')}}"> <i class="zmdi zmdi-globe-alt zmdi-hc-fw"></i> EN </a>
                @endif
            </li>
            @php($mails = \App\Models\ContactUs::where('seen',0)->get())

            <li class="dropdown">
                <a href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" class="d-inline-block" aria-expanded="true">
                    <i class="zmdi zmdi-comment-alt-text {{count($mails) ? 'icons-alert' :''}} zmdi-hc-fw"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" data-placement="bottom-end" data-x-out-of-boundaries="">
                    <div class="gx-card-header d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="card-heading">{{awtTrans('الرسائل')}}</h3>
                        </div>
                    </div>

                    <div class="dropdown-menu-perfectscrollbar1 d-flex a justify-content-center">

                        @if(count($mails))

                            <div class="messages-list">
                                <ul class="list-unstyled">
                                    @foreach($mails as $mail)
                                        <li class="media">
                                            <div class="user-thumb">
                                                <img  src="{{url('public/images/default.png')}}" class="rounded-circle size-40 user-avatar">
                                            </div>

                                            <div class="media-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="text-capitalize user-name mb-0">
                                                        <a href="{{route('contact_us')}}">{{$mail->name}}</a>
                                                    </h5>
                                                    <a href="{{route('contact_us')}}" class="meta-date"><small>{{$mail->created_at->format('h:i:s a')}}</small></a>
                                                </div>
                                                <p class="sub-heading">{{str_limit($mail->message,40)}}...</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            {{awtTrans('لا يوجد اشعارات')}}
                        @endif
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- /main header -->
