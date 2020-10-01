@foreach ($additions as $addition)
<form action="{{url('admin/updateAddition/'.$addition->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="additions-collection">
        <input type="text" class="form-control" name="addition_ar" value="{{$addition->addition_ar}}" placeholder="{{awtTrans('اسم الاضافه بالعربيه')}}" {{$type == 0  ? 'required' : 'readonly'}}>
        <input type="text" class="form-control" name="addition_en" value="{{$addition->addition_en}}" placeholder="{{awtTrans('اسم الاضافه بالانجليزيه')}}" {{$type == 0  ? 'required' : 'readonly'}} >
         @if ($type == 0)
            <input type="file" class="form-control" name="image">
        @endif
        <img src="{{url('public/images/services/'.$addition->image)}}" width="100px" height="100px" style="border-radius: 21px;padding: 4px;">
        @if ($type == 0)
            <button class="remove-addition delete_addition" data-id="{{$addition->id}}"><i class="fa fa-close" aria-hidden="true"></i></button>
            <button type="submit"><i class="fa fa-file" aria-hidden="true"></i></button>
        @endif
    </div>
</form>
@endforeach
