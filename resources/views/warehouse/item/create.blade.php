<div class="row">
    <div class="col-md-12">
        <form action="{{route('warehouse.po.item.store', [$po->id])}}" method="post" id="form-po-item-add"> {{csrf_field()}}

            <div class="form-group">
                <label for="product">Product</label>
                <select name="product" id="product" class="form-control"></select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="text" id="qty" class="form-control form-control-sm" name="qty">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="unit_price">Unit Price</label>
                <input type="text" id="unit_price" class="form-control form-control-sm" name="unit_price">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="discount">Discount</label>
                <input type="text" id="discount" class="form-control form-control-sm" name="discount">
                <div class="invalid-feedback"></div>
            </div>

        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-po-item-add', 'dataTables-po-item-list');
    });


    $('#product').select2({
        ajax: {
            url: '{{route('products.select')}}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data, params) {
                return {
                    results: data.data
                };
            }
        },
        placeholder: 'Search for a product',
        minimumInputLength: 1,
        templateResult: function (repo) {
            if (repo.loading)
                return repo.text;

            return repo.name;
        },
        templateSelection: function (repo) {
            return repo.name;
        },
        escapeMarkup: function (markup) {
            return markup;
        }
    });

</script>
