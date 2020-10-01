@extends('dashboard.layouts.app')
@section('title')
    {{awtTrans('الصلاحيات')}}
@endsection
@section('content')
    <div class="gx-card">
        <a href="{{route('add_permission')}}" class="gx-btn gx-btn-primary">
            <i class="fa fa-plus-circle"></i> <span>{{awtTrans('اضافة صلاحية')}}</span>
        </a>
    </div>
    <div class="gx-card">
        @Table
            @slot('tableHead')
                <th>{{awtTrans('الصلاحيه')}}</th>
                <th>{{awtTrans('تعديل')}} </th>
                <th>{{awtTrans('حذف')}} </th>
            @endslot

            @slot('tableBody')
                @foreach($roles as $role)
                    <tr>
                        <td>{{awtTrans($role->role)}}</td>
                        <td>
                            <a href="{{route('edit_permission', $role->id)}}" >
                                <i class="zmdi zmdi-edit zmdi-hc-fw zmdi-hc-lg text-primary"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <i data-id = "{{$role->id}}" data-toggle="modal" data-target="#delete" class="delete zmdi zmdi-close zmdi-hc-fw zmdi-hc-lg text-danger"></i>
                        </td>

                    </tr>
                @endforeach
            @endslot
        @endTable
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">حذف صلاحية ؟</h2>
                </div>
                <div class="modal-body">
                    <h3 style="margin-top: 35px">{{awtTrans('هل تريد مواصلة عملية الحذف ؟')}}</h3>
                    <div class="col_btn">
                        <form method="post" action="{{route('delete_permission')}}">
                            @csrf
                            <input type="hidden" id="id-permission" name="id" value="">
                            <button style="margin-top: 35px" type="submit" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 send-delete-all" style="margin-top: 19px">{{awtTrans('حـذف')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(".delete").click(function () {
            let  id = $(this).data("id");
            $('#id-permission').val(id);
        });
    </script>
@endsection
