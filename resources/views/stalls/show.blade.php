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

        @if(is_administrative())
            <form action="{{ route('stalls.update', [$store->id]) }}" method="post" id="form-store-status-edit">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="status">Status</label>
                    {{--<p class="form-control-static">paid</p>--}}
                    <select name="status" id="status" class="form-control">
                        <option @if($store->status == 'on-survey') selected @endif value="on-survey">On Survey</option>
                        <option @if($store->status == 'surveyed') selected @endif value="surveyed">Surveyed</option>
                        <option @if($store->status == 'paid') selected @endif value="paid">Paid</option>
                        <option @if($store->status == 'deployed') selected @endif value="deployed">Deployed</option>
                        <option @if($store->status == 'declined') selected @endif value="declined">Declined</option>
                    </select>

                </div>

                <div class="form-group">
                    <label for="deployment_date">Deploy date</label>
                    <input type="text" id="deployment_date" name="deployment_date" class="form-control"
                           autocomplete="off">

                </div>

                <button type="button" class="btn btn-info" id="btn-status">Update</button>
            </form>
        @endif

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

    $('#deployment_date').datepicker({
        // format: 'mm-dd-yyyy',
        todayBtn: 'linked',
        autoclose: true
    });

    $('#btn-status').on('click', function (event) {
        event.preventDefault();
        update('form-store-status-edit', 'dataTables-store-list')
    });


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
