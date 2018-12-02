<div class="btn-group btn-group-xs" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-warning " data-route="{{route('stalls.edit', $store->id)}}" onclick="edit(this)">
        <i class="fa fa-pencil"></i> Edit
    </button>

    <button type="button" class="btn btn-info " data-route="{{route('stalls.show', [$store->id])}}" onclick="show(this)">
        <i class="fa fa-eye"></i> Show
    </button>

    @if(Sentinel::hasAnyAccess(['stall.delete']))
    <button type="button" class="btn btn-danger" data-route="{{route('stalls.destroy', $store->id)}}"
            data-table="dataTables-store-list"
            data-token="{{csrf_token()}}"
            onclick="destroy(this)"> <i class="fa fa-trash"></i> Destroy
    </button>
    @endif
</div>
