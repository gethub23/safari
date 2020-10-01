@extends('dashboard.layouts.app')
@section('title')
    {{awtTrans('الرئيسية')}}
@endsection
@section('content')

    <div class="Block_Section flex_space">
        @foreach(Home() as $h)
            <a href="{{url($h['url'])}}" style="background-color: {{ $h['color'] }}">
                <div class="Gx_Block">
                    <div class="Gx_Card" style="color: {{ $h['color'] }}">
                        <span>{!! $h['icon'] !!}</span>
                    </div>
                    <div class="Gx_Body flex_space">
                        <div class="" style="position: relative;display: inline-flex">
                            <span class="shape" style="border: 3px dotted {{ $h['color'] }};"></span>
                            <strong style="color: {{ $h['color'] }}">{{$h['count']}}</strong>
                        </div>
                        <h3 class="color_light">{{awtTrans($h['name'])}} </h3>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
