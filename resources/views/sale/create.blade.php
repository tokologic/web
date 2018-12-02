<div class="row">
    <div class="col-md-12">
        <form action="{{route('sale.store')}}" method="post" id="form-sale-add"> {{csrf_field()}}

            <div class="form-group">
                <label for="payment_method">Payment Method *</label>
                <select name="payment_method" id="payment_method" class="form-control" autocomplete="off">
                    <option value="cash">Cash</option>
                    <option value="credit card">Credit Card</option>
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="amount">Amount *</label>
                <input type="number" name="amount" id="amount" class="form-control" autocomplete="off">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="cash">Cash *</label>
                <input type="number" name="cash" id="cash" class="form-control" autocomplete="off">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="change">Change *</label>
                <input type="number" name="change" id="change" class="form-control" autocomplete="off">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="tax">Tax *</label>
                <input type="number" name="tax" id="tax" class="form-control" autocomplete="off">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="info">Info *</label>
                <textarea name="info" id="info" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                <div class="invalid-feedback"></div>
            </div>
        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-sale-add', 'dataTables-sale-list');
    });
</script>
