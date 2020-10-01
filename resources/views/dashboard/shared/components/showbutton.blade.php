<td class="text-center">
    <i  data-toggle="modal" data-target="#show" class="show-model zmdi zmdi-eye  zmdi-hc-fw zmdi-hc-lg text-primary"
        @foreach ($row as $key =>  $value)
            data-{{$key}}   = "{{$value}}"
        @endforeach
    ></i>
</td>