<div class="row">
    <div class="col-md-12">
        <form action="{{route('brands.products.update', [$brand->id, $product->id])}}" method="post" id="form-product-edit">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <input type="hidden" value="{{ $product->id }}" name="id">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{ $product->name }}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea cols="30" rows="10" id="description" class="form-control" name="description">{{ $product->description }}</textarea>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="barcode">Barcode</label>
                <input type="text" id="barcode" class="form-control" name="barcode" value="{{ $product->barcode }}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" id="unit" class="form-control" name="unit" value="{{ $product->unit }}">
                <div class="invalid-feedback"></div>
            </div>
        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-product-edit', 'dataTables-product-list');
    });
</script>
