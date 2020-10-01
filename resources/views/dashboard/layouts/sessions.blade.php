@if ($errors->any())
    <script>
        toastr.error("{{awtTrans($errors->first())}}")
    </script>
@endif

@if(session()->has('success'))
    <script>
        toastr.success("{!! awtTrans(session()->get('success')) !!}")
    </script>
@endif

@if(session()->has('danger'))
    <script>
        toastr.error("{!! awtTrans(session()->get('danger')) !!}")
    </script>
@endif