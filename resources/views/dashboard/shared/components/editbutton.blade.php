<td class="text-center">
    <i  data-toggle="modal" data-target="#edit" class="edit zmdi zmdi-edit zmdi-hc-fw zmdi-hc-lg text-primary"
        @foreach ($row as $key =>  $value)
        data-{{$key}}   = "{{$value}}"
            @endforeach
    ></i>
</td>

