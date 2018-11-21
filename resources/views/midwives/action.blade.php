<div class="btn-group btn-group-xs" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-warning " data-route="{{route('midwives.edit', $midwife->id)}}" onclick="edit(this)">
        <i class="fa fa-pencil"></i> Edit
    </button>
    <button type="button" class="btn btn-danger" data-route="{{route('midwives.destroy', $midwife->id)}}"
            data-table="dataTables-midwife-list"
            data-token="{{csrf_token()}}"
            onclick="destroy(this)"> <i class="fa fa-trash"></i> Destroy
    </button>
</div>
