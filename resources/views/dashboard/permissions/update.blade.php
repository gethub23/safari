@section('styles')

@endsection

@extends('dashboard.layouts.app')
@section('title')
    {{awtTrans('الصلاحيات')}}
@endsection
@section('content')

    <div class="row">
        <div class="pull-right">
            <div class="checkbox checkbox-replace checkbox-danger pull-right">
                <input type="checkbox"  id="checkedAll" class="parent">
                <label for="checkedAll">{{awtTrans('تحديد الكل')}}</label>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card-box">
                <hr>
                <div class="card-footer">
                    <form action="{{route('update_permission')}}" method="post" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="id" value="{{$role->id}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-md-2"> {{awtTrans('اسم الصلاحية')}}</label>
                                    <div class="col-md-12"><input type="text" class="form-control" value="{{awtTrans($role->role)}}" required name="role"></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="gx-card p-0 no-shadow bg-transparent">
                                    <div class="gx-card-body ">
                                        <div class="price-tables row pt-default d-flex justify-content-around">
                                            {{editPermission($role->id)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-success btn-rounded waves-effect waves-light w-md m-b-5"><span style="font-weight: bolder;font-size: 15px">{{awtTrans('تعديل')}}</span></button>
                    </form>
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

