<div class="row">
    <div class="col-md-12">
        <form action="{{route('store-item.update', [$item->id])}}" method="post" id="form-stallitem-edit"> {{csrf_field()}}

            <div class="form-group">
                <label for="name">Product</label>
                <select name="product_id" id="" class="form-control form-control-sm">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" @if($item->product_id == $product->id) selected @endif>{{ $product->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="retail_price">Retail Price</label>
                <input type="number" name="retail_price" class="form-control" value="{{ $item->retail_price }}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="average_price">Average Price</label>
                <input type="number" name="average_price" class="form-control" value="{{ $item->average_price }}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="number" name="qty" class="form-control" value="{{ $item->qty }}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="min">Min</label>
                <input type="number" name="min" class="form-control" value="{{ $item->min }}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="max">Max</label>
                <input type="number" name="max" class="form-control" value="{{ $item->max }}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="whole_sale_price">Whole Sale Price</label>
                <input type="number" name="whole_sale_price" class="form-control" value="{{ $item->whole_sale_price }}">
                <div class="invalid-feedback"></div>
            </div>
        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-stallitem-edit', 'dataTables-stallitem-list');
    });
</script>
