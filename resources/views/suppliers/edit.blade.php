<div class="row">
    <div class="col-md-12">
        <form action="{{route('suppliers.update', $supplier->id)}}" method="post" id="form-supplier-edit">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
                <label for="region_id">Region</label>
                <select name="region_id" id="region_id" class="form-control form-control-sm">
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}" @if($region->id == $supplier->region_id) selected @endif>{{ $region->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="product_ids">Products</label>
                <select name="product_ids[]" id="product_ids" class="form-control form-control-sm" multiple>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" @if(in_array($product->id, $product_ids)) selected @endif>{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" class="form-control form-control-sm" name="name" required value="{{ $supplier->name }}">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="name">Email *</label>
                <input type="email" id="email" class="form-control form-control-sm" name="email" required value="{{ $supplier->email }}">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="name">Phone *</label>
                <input type="text" id="phone" class="form-control form-control-sm" name="phone" required value="{{ $supplier->phone }}">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="name">Address *</label>
                <textarea name="address" id="address" cols="30" rows="10" class="form-control form-control-sm">{{ $supplier->address }}</textarea>
                <div class="invalid-feedback"></div>

            </div>

        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-supplier-edit', 'dataTables-supplier-list');
    });
</script>
