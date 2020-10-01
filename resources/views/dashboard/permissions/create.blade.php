@extends('dashboard.layouts.app')
@section('title')
    {{awtTrans('الصلاحيات')}}
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="flex_space">
                    <div class="checkbox checkbox-replace checkbox-danger pull-right">
                        <label for="checkedAll">{{awtTrans('تحديد الكل')}}</label>
                        <input type="checkbox" id="checkedAll" class="parent">
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        <form action="{{route('store_permission')}}" method="post" id="permissionForm" >
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="role">{{awtTrans('اسم الصلاحية')}}</label>
                                        <div>
                                            <input type="text"  class="form-control"  name="role" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="gx-card p-0 no-shadow bg-transparent">
                                        <div class="gx-card-body ">
                                            <div class="price-tables row pt-default d-flex justify-content-around">
                                                {{addPermission()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row text-center">
                                <div class="col-12">
                                    <button type="submit" class="btn_button btn_primary">{{awtTrans('حــفــظ')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div><!-- end col -->
    </div>


@endsection
@section('script')
    <script>

        $('.parent').change(function () {
            var id = '.' + $(this).attr('id');

            if (this.checked) {
                $(id).each(function () {
                    this.checked = true
                })
            } else {
                $(id).each(function () {
                    this.checked = false;
                })
            }
        });

        $("#checkedAll").change(function () {
            if (this.checked) {
                $("input[type=checkbox]").each(function () {
                    this.checked = true
                })
            } else {
                $("input[type=checkbox]").each(function () {
                    this.checked = false;
                })
            }
        });
    </script>
@endsection

