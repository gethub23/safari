<div class="module-box-topbar">
    <div class="form-checkbox">
        <input type="checkbox" id="selectAll">
        <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
        <span>تحديد الكل</span>
    </div>

    @DeleteAll @endAddButton

</div>
<div class="module-list mail-list">
    <div class="custom-scrollbar module-list-scroll ps ps--active-y" id="messages"
         style="position: relative; height: 624.805px;">


        @forelse ($messages as $msg)
            <div class="module-list-item mail-cell">
                <div class="form-checkbox">
                    <input value="value2" name="deleted_id[]" type="checkbox" class="message">
                    <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                </div>
                <div class="module-list-info">
                    <div class="module-list-content">
                        <div class="mail-user-info">
                            <span class="sender-name" style="color: #000">{{$msg->name}}</span>
                            <span class="toolbar-separator" style="color: #000">&nbsp;</span>
                            <span class="subject" style="color: #000">{{$msg->subject}}</span>
                        </div>

                        {{--                                        <div class="message"><p> {{str_limit($msg->message,40)}}</p>--}}
                        <div class="message"><p> {{str_limit($msg->message,200)}}</p>
                            <div class="labels">
                                <span class="badge text-white bg-green darken-1">{{$msg->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            لا يوجد رسائل
        @endforelse
    </div>
</div>