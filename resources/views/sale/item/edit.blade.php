<div class="row">
    <div class="col-md-12">
        <form action="{{route('sale.item.update', [$saleitem->id, $saleitem->sale_id])}}" method="post" id="form-sale-item-edit">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
                <label for="product">Sale item</label>
                <select name="store_item_id" id="store_item_id" class="form-control">
                    @foreach($stallItems as $item)
                        <option value="{{ $item->id }}" @if($item->id === $saleitem->store_item_id) selected @endif>{{ $item->product->name }} - {{ rupiah($item->retail_price) }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="number" id="qty" class="form-control form-control-sm" name="qty" value="{{$saleitem->qty}}">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="unit_price">Unit Price</label>
                <input type="number" id="unit_price" class="form-control form-control-sm" name="unit_price" value="{{$saleitem->unit_price}}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" id="amount" class="form-control form-control-sm" name="amount" value="{{$saleitem->amount}}">
                <div class="invalid-feedback"></div>
            </div>

        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-sale-item-edit', 'dataTables-sale-item-list');
    });

</script>
