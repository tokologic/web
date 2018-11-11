<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-warning" data-route="{{route('products.edit', $product->id)}}" onclick="edit(this)">
        Edit
    </button>
    <button type="button" class="btn btn-outline-danger" data-route="{{route('products.destroy', $product->id)}}"
            data-table="dataTables-product-list"
            data-token="{{csrf_token()}}"
            onclick="destroy(this)">Destroy
    </button>
</div>
