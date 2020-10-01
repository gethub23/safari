@extends('dashboard.layouts.app')
@section('title')  {{awtTrans('التقارير')}}@endsection
@section('content')
    @if($supervisorReports->count())
        <div class="gx-card">
            <a href="{{route('deletereports')}}" class="gx-btn btn-danger">
                <i class="fa fa-trash"></i> <span>{{awtTrans('حذف الكل')}}</span>
            </a>
        </div>
        <div class="gx-card">
            @Table
                @slot('tableHead')
                    <th>{{awtTrans('العضو')}}</th>
                    <th>{{awtTrans('الحدث')}}</th>
                    <th>IP</th>
                    <th>{{awtTrans('البلد')}}</th>
                    <th>{{awtTrans('المنطقة')}}</th>
                    <th>{{awtTrans('المدينة')}}</th>
                    <th>{{awtTrans('التاريخ')}}</th>
                @endslot

                @slot('tableBody')
                    @foreach($supervisorReports as $r)
                        <tr>
                            <th scope="row">
                                <img src="{{asset('public/images/users/'.$r->User->avatar)}}" class="img-circle img-responsive img-rounded" width="30px" height="30px">
                            </th>
                            <td>{{$r->event}}</td>
                            <td>{{$r->ip}}</td>
                            <td>{{$r->country}}</td>
                            <td>{{$r->area}}</td>
                            <td>{{$r->city}}</td>
                            <td>{{$r->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                @endslot
            @endTable
        </div>
    @else
        <div class="Err_Block">
            <img  src="{{url('public/design/admin/images/no_found.png')}}">
        </div>
    @endif

@endsection