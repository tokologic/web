<div class="btn-group btn-group-xs" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-warning "
            data-route="{{route('sale.item.edit', [$sale_item->id, $sale_item->store_item_id])}}" onclick="edit(this)">
        <i class="fa fa-pencil"></i> Edit
    </button>
    <button type="button" class="btn btn-danger"
            data-route="{{route('sale.item.destroy', [$sale_item->id, $sale_item->store_item_id])}}"
            data-table="dataTables-sale-item-list"
            data-token="{{csrf_token()}}"
            onclick="destroy(this)"><i class="fa fa-trash"></i> Destroy
    </button>
</div>

