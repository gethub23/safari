<div class="modal fade" id="edit" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            @include('dashboard.shared.ajax.loder')
            <div class="modal-header border-0">
                <h2 class="modal-title" id="exampleModalCenterTitle"> {{awtTrans('تعديل')}} {{awtTrans($singleName)}}</h2>
            </div>
            <div class="modal-body">
                <form action="" method="post" autocomplete="off" enctype="multipart/form-data" id="edit_form">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                             <input type="text" name="id" id="id" hidden>
                            {{$EditModelContent}}
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <hr>
                        <a href="javascript:void(0)" class="btn text-secondary card-link" data-dismiss="modal">{{awtTrans('اغلاق')}}</a>
                        <button type="submit"  class="btn text-primary card-link">{{awtTrans('تعديل')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>