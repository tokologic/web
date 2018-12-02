<div class="row">
    <div class="col-md-12">

        <div class="form-group">
            <label for="midwife_id">Midwife</label>
            <p class="form-control-static">{{ $store->midwife->first_name }} {{ $store->midwife->last_name }}</p>
            <div class="invalid-feedback"></div>
        </div>


        <div class="form-group">
            <label for="name">Name *</label>
            <p class="form-control-static">{{ $store->name }}</p>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label for="region_id">Region</label>
            <p class="form-control-static">{{ $store->region->name }}</p>
            <div class="invalid-feedback"></div>
        </div>


        <div class="form-group">
            <label for="address">Address *</label>
            <p class="form-control-static">{{ $store->address }}</p>
        </div>

        <div class="form-group">
            <label for="acreage">Acreage *</label>
            <p class="form-control-static">{{ $store->acreage }}</p>
        </div>

        <a href="#" class="btn btn-success">Approve</a>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-store-edit', 'dataTables-store-list');
    });
</script>
