<div class="row">
    <div class="col-md-12">
        <form action="{{route('warehouses.stocks.update', [$stock->warehouse->id, $stock->id])}}" method="post"
              id="form-stock-edit">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
                <label for="min">Min</label>
                <input type="text" id="min" class="form-control form-control-sm" name="min" required
                       value="{{ $stock->min}}">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="max">Min</label>
                <input type="text" id="max" class="form-control form-control-sm" name="max" required
                       value="{{ $stock->max}}">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="whole_sale_price">Whole sale price</label>
                <input type="text" id="whole_sale_price" class="form-control form-control-sm" name="whole_sale_price" required
                       value="{{ $stock->whole_sale_price}}">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="bin_location">Bin location</label>
                <input type="text" id="bin_location" class="form-control form-control-sm" name="bin_location" required
                       value="{{ $stock->bin_location}}">
                <div class="invalid-feedback"></div>

            </div>
        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-stock-edit', 'dataTables-stock-list');
    });
</script>
