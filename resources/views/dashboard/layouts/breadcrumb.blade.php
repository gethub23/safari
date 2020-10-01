<div class="page-heading d-sm-flex justify-content-sm-between align-items-sm-center">
    <h2 class="title mb-3 mb-sm-0">@yield('title')</h2>
    <nav class="mb-0 breadcrumb">
        <a href="{{url('/admin')}}" class="breadcrumb-item">{{awtTrans('الرئيسيه')}}</a>
        @if( \Request::route()->getName() != 'dashboard')
            <span class="active breadcrumb-item">{{awtTrans(\Request::route()->getAction()['title'])}}</span>
        @endif
    </nav>
</div>