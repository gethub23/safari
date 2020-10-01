<div class="modal fade" id="add_model" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            @include('dashboard.shared.ajax.loder')
            <div class="modal-header border-0">
                <h2 class="modal-title" id="exampleModalCenterTitle">{{awtTrans('اضافه')}} {{awtTrans($singleName)}}</h2>
            </div>
            <div class="modal-body">
                <form  id="add_form_submit" action="{{isset($withRoutes) ? route($addRoute) :  url('admin/'.$routeName) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="container">
                        <div class="row">
                            {{$AddModelContent}}
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <a href="javascript:void(0)" class="btn text-secondary card-link" data-dismiss="modal">اغلاق</a>
                        <button type="submit"  class="btn text-primary card-link">{{awtTrans('اضافه')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
