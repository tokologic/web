<div class="row">
    <div class="col-md-12">
        <form action="{{route('store-item.update', [$item->id])}}" method="post" id="form-stallitem-edit">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="product_id">Product</label>
                <p class="form-control-static">{{ $item->product->name }}</p>
            </div>


            <div class="form-group">
                <label for="average_price">Average Price</label>
                <p class="form-control-static">{{ $item->average_price }}</p>
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <p class="form-control-static">{{ $item->qty }}</p>
            </div>

            <div class="form-group">
                <label for="min">Min</label>
                <input type="number" name="min" id="min" class="form-control" value="{{ $item->min }}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="max">Max</label>
                <input type="number" id="max" name="max" class="form-control" value="{{ $item->max }}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="retail_price">Retail Price</label>
                <input type="number" name="retail_price" class="form-control" value="{{ $item->retail_price }}">
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
