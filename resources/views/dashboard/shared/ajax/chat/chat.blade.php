<div class="chat-main-header header_user_name">
    <a id="gxChatModuleSideNav" href="javascript:void(0)"
       class="drawer-btn d-block action-btn action-btn d-lg-none mr-2">
        <i class="zmdi zmdi-comment-text zmdi-hc-lg"></i>
    </a>
    <div class="header_info width_100">
        <div class="" style="display: inline-block">
            <div class="chat-avatar-mode">
                <img src="{{url('public/images/users/'.$client->avatar)}}" class="user-avatar">
            </div>
        </div>
        <div class="chat-contact-name">{{$client->name}}</div>
    </div>
</div>
<div class="chat-list-scroll ps ps--active-y">
    <div class="chat-main-content chat_content chat_group" id="room{{$client->id}}">
        @forelse($messages as $msg)

            @if($msg->s_id== $client->id)
                <div class="d-flex flex-nowrap chat-item">
                    <div class="bubble">{{$msg->message}}</div>
                    <div class="time">{{$msg->created_at->format('h:i:s a')}}</div>
                </div>

            @else
                <div class="d-flex flex-nowrap chat-item flex-row-reverse">
                    <div class="bubble">{{$msg->message}}</div>
                    <div class="time">{{$msg->created_at->format('h:i:s a')}}</div>
                </div>

            @endif

            @endforeach
    </div>
</div>

<div class="form_sent">
    <textarea class="chat-textarea" id="message_box" placeholder="{{awtTrans('ادخل الرسالة')}}" data-id={{$client->id}}></textarea>
    <a class="action-btn" href="javascript:void(0)" id="send_message" data-id={{$client->id}}><i class="zmdi  zmdi-mail-send"></i></a>
</div>


