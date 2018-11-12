{{--<a href="{{route('brands.variants.index', $brand->id)}}" class="btn btn-sm btn-outline-info">View</a>--}}

<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-warning" data-route="{{route('brands.edit', $brand->id)}}" onclick="edit(this)">
        Edit
    </button>
    <button type="button" class="btn btn-outline-danger" data-route="{{route('brands.destroy', $brand->id)}}"
            data-table="dataTables-brand-list"
            data-token="{{csrf_token()}}"
            onclick="destroy(this)">Destroy
    </button>
</div>
