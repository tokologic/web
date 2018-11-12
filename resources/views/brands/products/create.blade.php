<div class="row">
    <div class="col-md-12">
        <form action="{{route('brands.products.store', $brand->id)}}" method="post" id="form-product-add"> {{csrf_field()}}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description"></textarea>
                <div class="invalid-feedback"></div>
            </div>
        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-product-add', 'dataTables-product-list');
    });
</script>
