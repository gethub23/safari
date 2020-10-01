@if($message)
    <div class="back_click">
        <a href="javascript:void(0)" id="back_to_inbox"><i class="zmdi zmdi-arrow-back zmdi-hc-2x"></i></a>
    </div>
    <div class="module-box-column">
        <div class="module-detail mail-detail block_email">
            <div class="module-list-scroll custom-scrollbar ps" style="position: relative; height: 621.055px;">
                <div class="mail-header">
                    <div class="flex_space width_100">
                        <div class="subject">{{$message->subject}}</div>
                        <div class="labels">
                            <span class="badge text-white bg-green darken-1">{{$message->created_at->format('Y-m-d h:i:s a')}}</span>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="mail-user-info width_100">
                    <img class="img_senter" alt="Alice Freeman" src="{{url('public/images/users/'.$message->user->avatar)}}">
                    <div class="sender-name width_100">
                        <h4 class="send-to text-grey">{{$message->user->name}}</h4>
                        <div class="flex_space width_100">
                            <p class="send-to text-grey">{{$message->email}}</p>
                        </div>
                    </div>

                </div><br>

                <p class="message text-center">{{$message->message}}</p>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                </div>
            </div>
        </div>
    </div>
@else
    <h4 class="not_found_text">{{awtTrans('لا يوجد رسائل')}}</h4>
@endif
