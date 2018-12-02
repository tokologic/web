<div class="row">
    <div class="col-md-12">
        <form action="{{route('stalls.store')}}" method="post" id="form-store-add"> {{csrf_field()}}

            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" class="form-control form-control-sm" name="name">
                <div class="invalid-feedback"></div>
            </div>

            {{--<div class="form-group">--}}
                {{--<label for="midwife_id">Midwife</label>--}}
                {{--<select name="midwife_id" id="midwife_id" class="form-control form-control-sm">--}}
                    {{--@foreach($midwives as $midwife)--}}
                        {{--<option value="{{ $midwife->id }}">{{ $midwife->first_name }}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
                {{--<div class="invalid-feedback"></div>--}}
            {{--</div>--}}

            <div class="form-group">
                <label for="region_id">Region</label>
                <select name="region_id" id="region_id" class="form-control form-control-sm">
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>



            <div class="form-group">
                <label for="address">Address *</label>
                <textarea name="address" id="address" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="acreage">Acreage *</label>
                <input type="number" min="1" id="acreage" class="form-control form-control-sm" name="acreage">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="package">Package</label>
                <br><small>Untuk informasi paket lebih lengkap silahkan klik link <a href="#">berikut</a>.</small>
                <select name="package_id" id="package" class="form-control">
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}">{{ $package->name }} - {{ rupiah($package->price) }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" id="latitude" class="form-control form-control-sm" name="latitude">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" id="longitude" class="form-control form-control-sm" name="longitude">
                <div class="invalid-feedback"></div>
            </div>

            <img src="{{ asset('img/map-dummy.png') }}" alt="Map" class="img-responsive">

        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-store-add', 'dataTables-store-list');
    });
</script>
