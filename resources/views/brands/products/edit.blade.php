<div class="row">
    <div class="col-md-12">
        <form action="{{route('brands.products.update', [$brand->id, $product->id])}}" method="post" id="form-product-edit">
            {{csrf_field()}}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{$product->name}}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description">{{$product->description}}</textarea>
                <div class="invalid-feedback"></div>
            </div>
        </form>
    </div>
</div>

<script>

    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        update('form-product-edit', 'dataTables-product-list')
    });
</script>
