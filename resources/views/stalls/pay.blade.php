<div class="row">
    <div class="col-md-12">
        <form action="{{route('stalls.update', $store->id)}}" method="post" id="form-store-edit">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
                <label for="payment">Jumlah pembayaran</label>
                <input type="number" id="payment" class="form-control" name="payment" value="">
                <div class="invalid-feedback"></div>
            </div>
        </form>
    </div>
</div>

<script>

    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        update('form-store-edit', 'dataTables-store-list')
    });
</script>
