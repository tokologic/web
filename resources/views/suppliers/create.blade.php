<div class="row">
    <div class="col-md-12">
        <form action="{{route('suppliers.store')}}" method="post" id="form-supplier-add"> {{csrf_field()}}

            <div class="form-group">
                <label for="region_id">Region</label>
                <select name="region_id" id="region_id" class="form-control form-control-sm">
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="product_ids">Products</label>
                <select name="product_ids[]" id="product_ids" class="form-control form-control-sm" multiple>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" class="form-control form-control-sm" name="name">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="name">Email *</label>
                <input type="email" id="email" class="form-control form-control-sm" name="email">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="name">Phone *</label>
                <input type="text" id="phone" class="form-control form-control-sm" name="phone">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="address">Address *</label>
                <textarea name="address" id="address" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                <div class="invalid-feedback"></div>

            </div>

        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-supplier-add', 'dataTables-supplier-list');
    });
</script>
