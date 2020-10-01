<div class="modal fade" id="deleteAll" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @include('dashboard.shared.ajax.loder')
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">{{awtTrans('حذف جميع المحدد ؟')}}</h2>
            </div>
            <div class="modal-body">
                <h3>{{awtTrans('هل تريد مواصلة عملية الحذف ؟')}}</h3>
                @isset($deleteMessage)
                     <h1 class="text-danger text-center " style="font-size: 20px">{{awtTrans($deleteMessage)}}</h1>
                @endisset
                <div class="col_btn">
                    <button type="submit" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 send-delete-all">{{awtTrans('حـذف')}}</button>
                    <button type="submit" class="btn btn_black btn-rounded w-md waves-effect waves-light m-b-5 send-delete-all" data-toggle="modal" data-dismiss="modal">{{awtTrans('إلغاء')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
