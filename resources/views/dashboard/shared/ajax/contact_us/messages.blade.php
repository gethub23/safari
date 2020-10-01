<div class="module-box-topbar">
    <div class="form-checkbox">
        <input type="checkbox" id="selectAll">
        <span class="check" style="top: 6px;"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
        <span>{{awtTrans('تحديد الكل')}}</span>
    </div>

    <a href="javascript:void(0)" class="gx-btn btn-danger"id="deleteAll">
        <i class="fa fa-trash"></i> <span>{{awtTrans('حذف المحدد')}}</span>
    </a>

</div>
<div class="module-list mail-list">
    <div class="custom-scrollbar module-list-scroll ps--active-y" id="messages">

        <form action="{{route('delete_mail')}}" method="post" id="messages_form">
            @csrf

            @forelse ($messages as $msg)
                <div class="module-list-item mail-cell block_massage {{!$msg->seen ? 'active_massage' :'' }}">
                    <div class="form-checkbox">
                        <input value="{{$msg->id}}" name="deleted_id[]" type="checkbox" class="message">
                        <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                    </div>
                    <div class="module-list-info  message_info" data-id="{{$msg->id}}">
                        <div class="module-list-content">
                            <div class="flex_space">
                                <span class="sender-name">{{$msg->name}}</span>
                                <span class="subject">{{$msg->subject}}</span>
                            </div>
                            <div class="message"><p> {{str_limit($msg->message,200)}}</p>
                                <div class="labels text-left">
                                    <span class="badge color_pink">{{$msg->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        @empty
            <h4 class="not_found_text">{{awtTrans('لا يوجد رسائل')}}</h4>
        @endforelse
    </div>
</div>
