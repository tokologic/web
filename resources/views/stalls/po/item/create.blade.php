<div class="row">
    <div class="col-md-12">
        <form action="{{route('stalls.po.item.store', [$po->id])}}" method="post" id="form-po-item-add"> {{csrf_field()}}

            <div class="form-group">
                <label for="product">Product</label>
                <select name="product" id="product" class="form-control"></select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="number" id="qty" class="form-control form-control-sm" name="qty">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="unit_price">Unit Price</label>
                <p id="unit_price">Rp.0,00</p>
                <input type="hidden" id="input_unit_price" class="form-control form-control-sm" name="unit_price">
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
            url: '{{route('prices.select')}}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term,
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

            return repo.product_name;
        },
        templateSelection: function (repo) {
            $("#unit_price").text(repo.unit_price_rupiah);
            $("#input_unit_price").val(repo.unit_price);
            return repo.product_name;
        },
        escapeMarkup: function (markup) {
            return markup;
        }
    });

</script>
