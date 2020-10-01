<div class="modal fade" id="delete" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @include('dashboard.shared.ajax.loder')
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">{{awtTrans('حذف')}} {{awtTrans($singleName)}}</h2>
            </div>
            <div class="modal-body">
                <p  class=" text-center ">{{awtTrans('هل تريد مواصلة عملية الحذف ؟')}}</p>
                @isset($deleteMessage)
                     <h1 class="text-danger text-center " style="font-size: 20px">{{awtTrans($deleteMessage)}}</h1>
                @endisset
                <form action="" method="post" id="delete_form">
                    <input type="text" id="delete_id" hidden>
                    {{csrf_field()}}
                    @method('delete')
                    <div class="col_btn">
                        <a href="javascript:void(0)" class="btn text-secondary card-link" data-dismiss="modal">{{awtTrans('تراجع')}}</a>
                        <button type="submit" class="btn text-primary card-link" >{{awtTrans('حذف')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
