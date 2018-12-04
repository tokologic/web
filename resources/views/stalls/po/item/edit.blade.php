<div class="row">
    <div class="col-md-12">
        <form action="{{route('stalls.po.item.update', [$item->po->id, $item->id])}}" method="post" id="form-po-item-edit">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
                <label for="product">Product</label>
                <select name="product" id="product" class="form-control">
                    <option value="{{ $item->product_id }}" selected>{{ $item->product->name }}</option>
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="text" id="qty" class="form-control form-control-sm" name="qty" value="{{ $item->qty }}">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="unit_price">Unit Price</label>
                <p id="unit_price">{{ rupiah($item->unit_price) }}</p>
                <input type="hidden" class="form-control form-control-sm" name="unit_price" value="{{ $item->unit_price }}">
                <div class="invalid-feedback"></div>
            </div>

        </form>
    </div>
</div>

<script>

    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        update('form-po-item-edit', 'dataTables-po-item-list')
    });

    // $('#product').select2();

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

    $('#select2-product-container').text('{{ $item->product->name }}')
</script>
