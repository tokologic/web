<div class="row">
    <div class="col-md-6">

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

    </div>

    <div class="col-md-6">


        <div class="form-group">
            <label for="package">Package</label>
            <p class="form-control-static">{{ optional($store->package)->name }}</p>
        </div>

        <div class="form-group">
            <label for="latitude">Latitude</label>
            <p class="form-control-static">{{ $store->latitude }}</p>

        </div>

        <div class="form-group">
            <label for="longitude">Longitude</label>
            <p class="form-control-static">{{ $store->longitude }}</p>

        </div>

        <div class="form-group">
            <label for="pay">Payment status</label>
            <p class="form-control-static">paid</p>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset('img/map-dummy.png') }}" alt="Map" class="img-responsive">


        </div>
    </div>

    <div class="row mt-15">
        <div class="col-md-12">
            @if(Sentinel::hasAnyAccess(['stall.approve']))
                <button type="button" class="btn btn-success" id="btn-store-approve">Approve</button>
            @endif
        </div>
    </div>

</div>

<script>
    $('#btn-store-approve').on('click', function (event) {
        event.preventDefault();

        bootbox.confirm({
            // title: "Destroy planet?",
            message: "Do you want to approve this store?",
            callback: function (result) {
                if (result) {
                    $.ajax({
                        type: "POST",
                        url: '{{ route('stalls.approve', [$store->id]) }}',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (data) {
                            // alert.removeClass('hidden');
                            // if (data['error'])
                            //     alert.text(data['message']);
                            // else
                            //     alert.text('Successfully destroy data');

                            window.LaravelDataTables['dataTables-store-list'].ajax.reload();
                            $('#modal').modal('hide');

                        },
                        error: function (r) {

                        }
                    });

                }
            }
        })
    });
</script>
