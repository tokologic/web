<div class="row">
    <div class="col-md-12">
        <form action="{{route('warehousers.store')}}" method="post" id="form-midwife-add"> {{csrf_field()}}

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control form-control-sm" name="email">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="first_name">Nama depan</label>
                <input type="text" id="first_name" class="form-control form-control-sm" name="first_name">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="last_name">Nama belakang</label>
                <input type="text" id="last_name" class="form-control form-control-sm" name="last_name">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="warehouse_id">Gudang</label>
                <select name="warehouse_id" class="form-control form-control-sm" id="warehouse_id">
                    @foreach($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}">{{$warehouse->name}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control form-control-sm" name="password">
                <div class="invalid-feedback"></div>

            </div>
        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-midwife-add', 'dataTables-midwife-list');
    });

    $('#warehouse_id').select2();
</script>
