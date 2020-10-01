@extends('dashboard.layouts.app')
@section('title'){{awtTrans($pluralName)}}@endsection
@section('content')
    <div class="gx-card">
        @Reload @endReload
        @DeleteAll @endAddButton
        @AddButton @endAddButton
    </div>
    <div class="gx-card Block_Up">
        @if($rows->count())
            @Table
                @slot('tableHead')
                    <th>
                        <div class="form-checkbox">
                            <input type="checkbox" value="value1" name="name1" id="checkedAll">
                            <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                        </div>
                    </th>
                    <th>{{awtTrans('الاسم بالعربيه')}}</th>
                    <th>{{awtTrans('الاسم بالانجليزيه')}}</th>
                    <th>{{awtTrans('التاريخ')}}</th>
                    <th>{{awtTrans('تعديل')}} </th>
                    <th>{{awtTrans('عرض')}} </th>
                    <th>{{awtTrans('حذف')}} </th>
                @endslot

                @slot('tableBody')
                    @foreach($rows as $row)
                        <tr id="hide_on_delete_{{$row->id}}">
                            <td class="text-center">
                                <div class="form-checkbox">
                                    <input type="checkbox" class="checkSingle" id="{{$row->id}}">
                                    <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                                </div>
                            </td>
                            <td>{{$row->name_ar}}</td>
                            <td>{{$row->name_en}}</td>
                            <td>{{$row->created_at->diffForHumans()}}</td>
                            @EditButton(['row' =>[
                                'id'         => $row->id ,
                                'name_ar'    => $row->name_ar ,
                                'name_en'    => $row->name_en ,
                            ]])@endEditButton
                            @ShowButton(['row' =>[
                                'id'         => $row->id ,
                                'name_ar'    => $row->name_ar ,
                                'name_en'    => $row->name_en ,
                            ]])@endShowButton
                            @DeleteButton(['id' => $row->id]) @endDeleteButton
                        </tr>
                    @endforeach
                @endslot
            @endTable
        @else
            <div class="Err_Block">
                <img  src="{{url('public/design/admin/images/no_found.png')}}">
            </div>
        @endif
    </div>
    @AddModel
        @slot('AddModelContent')
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم بالعربيه')}}</label>
                <input type="text" name="name_ar" id="" class="form-control" value="{{old('name_ar')}}"  placeholder="{{awtTrans('ادخل الاسم بالعربيه')}}" autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم بالانجليزيه')}}</label>
                <input type="text" name="name_en" id="" class="form-control" value="{{old('name_en')}}"  placeholder="{{awtTrans('ادخل الاسم بالانجليزيه')}}" autocomplete="nope" required>
            </div>
        @endslot
    @endAddModel

    @EditModel
        @slot('EditModelContent')
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم بالعربيه')}}</label>
                <input type="text" name="name_ar" id="name_ar" class="form-control" value="{{old('name_ar')}}"  autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم بالانجليزيه')}}</label>
                <input type="text" name="name_en" id="name_en" class="form-control" value="{{old('name_en')}}"   autocomplete="nope" required>
            </div>
        @endslot
    @endEditModel

    @ShowModel
        @slot('ShowModelContent')
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم بالعربيه')}}</label>
                <input type="text" name="name_ar" id="" class="form-control name_ar" value="{{old('name_ar')}}"  autocomplete="nope" required>
            </div>
            <div class="form-group col-sm-6 col-md-6 mw-100">
                <label for="field-1" class="control-label"> {{awtTrans('الاسم بالانجليزيه')}}</label>
                <input type="text" name="name_en" id="" class="form-control name_en" value="{{old('name_en')}}"   autocomplete="nope" required>
            </div>
        @endslot
    @endShowModel
    @DeleteAllModel @endDeleteAllModel
    @DeleteModel @endDeleteModel
    @Scripts  @endScripts
@endsection
