
<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-warning" data-route="{{route('brands.products.edit', [$product->brand_id, $product->id])}}" onclick="edit(this)">
        Edit
    </button>
    <button type="button" class="btn btn-outline-danger" data-route="{{route('brands.products.destroy', [$product->brand_id, $product->id])}}"
            data-table="dataTables-product-list"
            data-token="{{csrf_token()}}"
            onclick="destroy(this)">Destroy
    </button>
</div>
