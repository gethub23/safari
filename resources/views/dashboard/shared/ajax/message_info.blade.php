@if($message)
    <div class="module-box-topbar">
        <a href="javascript:void(0)" id="back_to_inbox"><i class="zmdi zmdi-arrow-back zmdi-hc-2x text-muted"></i></a>
    </div>
    <div class="module-box-column">
        <div class="module-detail mail-detail">
            <div class="module-list-scroll custom-scrollbar ps" style="position: relative; height: 621.055px;">
                <div class="mail-header">
                    <div class="mail-header-content col pl-0">
                        <div class="subject">{{$message->subject}}</div>
                        <div class="labels">
                            <span class="badge text-white bg-green darken-1">{{$message->created_at->format('Y-m-d h:i:s a')}}</span>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="mail-user-info">
                    <img class="rounded-circle avatar size-40 mr-3" alt="Alice Freeman" src="https://via.placeholder.com/150x150">
                    <div class="sender-name">{{$message->name}}
                        <div class="send-to text-grey">{{$message->email}}</div>
                        <div class="send-to text-grey">{{$message->phone}}</div>
                    </div>

                </div><br>

                <p class="message">{{$message->message}}</p>
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
    لا يوجد رسائل
@endif