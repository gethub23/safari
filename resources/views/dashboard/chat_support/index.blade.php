@extends('dashboard.layouts.app')
@section('title'){{awtTrans('الدعم الفني')}}@endsection
@section('content')

    <div class="gx-module chat-module">
        <div id="gxChatModuleSidebar" class="chat-sidenav" style="">
            <div class="chat-sidenav-main">
                <div class="chat-sidenav-header">
                    <div class="chat-user-hd">
                        <div class="chat-avatar mr-3">
                            <div class="chat-avatar-mode">
                                <img src="{{url('public/images/users/'.Auth::user()->avatar)}}" class="user-avatar size-50" alt="">
                            </div>
                        </div>
                        <div class="module-user-info d-flex flex-column justify-content-center">
                            <div class="module-title">
                                <h5 class="mb-0">{{Auth::user()->name}}</h5>
                            </div>
                            <div class="module-user-detail">
                                <a href="javascript:void(0)" class="text-muted">{{Auth::user()->email}}</a>
                            </div>
                        </div>
                    </div>

{{--                    <div class="search-wrapper">--}}
{{--                        <div class="search-bar right-side-icon bg-transparent">--}}
{{--                            <div class="form-group">--}}
{{--                                <input class="form-control border-0" placeholder="Search or start new chat" value=""--}}
{{--                                       type="search">--}}
{{--                                <button class="search-icon">--}}
{{--                                    <i class="zmdi zmdi-search zmdi-hc-lg"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>

                <div class="chat-sidenav-content">
                    <div class="tab-content">
                        <div id="chatList" class="tab-pane active ps-custom-scrollbar ps" style="position: relative; height: 564.062px;">
                            <div class="chat-user" id="room_section">
                                @forelse($rooms as $room)
                                    @php($client = $room->sender->type=='user' ? $room->sender : $room->receiver)
                                <div class="chat-user-item room" data-room="{{$room->room}}" data-id="{{$client->id}}" data-unread="{{$room->room}}_unread" id="{{$room->room}}">
                                    <div class="chat_user">
                                        <div class="chat_avatar">
                                            <div class="chat_avatar_mode">
                                                <img src="{{url('public/images/users/'.$client->avatar)}}" class="user_photo" alt="">
                                            </div>
                                        </div>
                                        <div class="chat_info">
                                            <div class="flex_space">
                                                <span class="name">{{$client->name}}</span>
                                                <div class="last_message_time">{{$room->created_at->diffForHumans()}}</div>
                                            </div>
                                            <div class="info_massage">{{str_limit($room->message,25)}}</div>
                                        </div>

                                        @if($room->unread!=0)
                                            <div class="chat_date">
                                                <span class="badge_chat" id="{{$room->room}}_unread">{{$room->unread}}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @empty
                                    <h4 class="not_found_text"{{awtTrans('لا يوجد رسائل')}}></h4>
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="chat-module-box" >
            <div class="chat-box">
                <div class="chat-box-main">
                    <div class="chat-main" id="chat_messages" >
                        <div class="chat-list-scroll">
                            <div class="loader-view h-100">
                                <i class="zmdi zmdi-comment s-128 text-muted"></i>
                                <h1 class="text-muted">{{awtTrans('اختار المستخدم لبدأ المحادثة')}}</h1>
                                <a id="gxChatModuleSideNav"
                                   class="gx-btn gx-flat-btn gx-btn-primary drawer-btn d-block d-lg-none"
                                   href="javascript:void(0)">
                                    {{awtTrans('اختار المستخدم لبدأ المحادثة')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script type="text/javascript">


        $(document).on('click', '.room', function () {

            let ob          = $(this);
            let id          = ob.data('id');
            let room        = ob.data('room');
            let unread      = ob.data('unread');
            $.ajax({
                type: "get",
                url: "{{route('get_chat')}}",
                data: {_token: "{{csrf_token()}}", room: room, id : id},
                cache: false,
                success: function (data) {

                    $('#chat_messages').empty();
                    $('#chat_messages').append(data.messages);
                    $(".chat_content").animate({ scrollTop: $('.chat_content').prop("scrollHeight")}, 1000);

                    $('.room').removeClass('active');
                    ob.addClass('active');
                    $('#'+unread).remove();



                }
            });

        });

        //send message
        $(document).on('click', '#send_message', function () {

            let msg_box = $('#message_box');
            let msg = msg_box.val().trim();
            let id = $(this).data('id');

            if(msg !=='')
                sendMessage(msg_box,msg, id);

        });

        $(document).on('keypress', '#message_box', function (e) {

            let msg = $(this).val().trim();
            let id = $(this).data('id');

            if(msg !=='' &&  e.which == 13)
                sendMessage($(this),msg, id);

        });

        function sendMessage(msg_box, msg,id){

            $.ajax({
                type: "post",
                url: "{{route('send_message')}}",
                data: {_token: "{{csrf_token()}}", message: msg, id : id},
                cache: false,
                success: function (data) {

                    $('.chat_content').append(data.messages);
                    msg_box.val('');
                    $(".chat_content").animate({ scrollTop: $('.chat_content').prop("scrollHeight")}, 1000);

                    if(msg.length >25)
                        $('#room'+id+' .info_massage').html(msg.substring(25));
                    else
                        $('#room'+id+' .info_massage').html(msg);

                    $('#room'+id).prependTo( $('#room_section'));
                }
            });
        }

    </script>



@endsection
