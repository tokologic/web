<div class="row">
    <div class="col-md-12">
        <form action="{{route('warehouse.gr.item.store', [$po->id])}}" method="post" id="form-gr-item-add"> {{csrf_field()}}

            <input type="hidden" value="{{ $poItem->id }}" name="po_item_id">
            <div class="form-group">
                <label for="qty">Qty</label>
                <input type="number" id="qty" class="form-control form-control-sm" name="qty" autocomplete="off">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="reference">Reference</label>
                <textarea id="reference" class="form-control form-control-sm" name="reference"></textarea>
                <div class="invalid-feedback"></div>

            </div>


        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-gr-item-add', 'dataTables-gr-item-list');
    });
</script>
