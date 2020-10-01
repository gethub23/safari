<div class="modal fade" id="show" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h2 class="modal-title" id="exampleModalCenterTitle"> {{awtTrans('عرض')}} {{awtTrans($singleName)}}</h2>
            </div>
            <div class="modal-body">
                <form id="show_form">
                    <div class="container">
                        <div class="row">
                            {{$ShowModelContent}}
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <hr>
                        <a href="javascript:void(0)" class="btn text-secondary card-link" data-dismiss="modal">{{awtTrans('اغلاق')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>