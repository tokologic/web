<div class="btn-group btn-group-xs" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-warning " data-route="{{route('store-item.edit', $item->id)}}" onclick="edit(this)">
        <i class="fa fa-pencil"></i> Edit
    </button>
    {{--<button type="button" class="btn btn-danger" data-route="{{route('store-item.destroy', $item->id)}}"
            data-table="dataTables-stallitem-list"
            data-token="{{csrf_token()}}"
            onclick="destroy(this)"> <i class="fa fa-trash"></i> Destroy
    </button>--}}
</div>
