<div class="d-flex flex-nowrap chat-item flex-row-reverse">
    <div class="bubble">{{$msg->message}}</div>
    <div class="time">{{$msg->created_at->format('h:i:s a')}}</div>
</div>