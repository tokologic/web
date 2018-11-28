<div class="row">
    <div class="col-md-12">
        <form action="{{route('stores.update', $store->id)}}" method="post" id="form-store-edit">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
                <label for="midwife_id">Midwife</label>
                <select name="midwife_id" id="midwife_id" class="form-control form-control-sm">
                    @foreach($midwives as $midwife)
                        <option value="{{ $midwife->id }}" @if($store->midwife_id == $midwife->id) selected @endif>{{ $midwife->first_name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="region_id">Region</label>
                <select name="region_id" id="region_id" class="form-control form-control-sm">
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}" @if($store->region_id == $region->id) selected @endif>{{ $region->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" class="form-control form-control-sm" name="name" value="{{ $store->name }}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="address">Address *</label>
                <textarea name="address" id="address" cols="30" rows="10" class="form-control form-control-sm">{{ $store->address }}</textarea>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="acreage">Acreage *</label>
                <input type="number" min="1" id="acreage" class="form-control form-control-sm" name="acreage" value="{{ $store->acreage }}">
                <div class="invalid-feedback"></div>
            </div>

        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-store-edit', 'dataTables-store-list');
    });
</script>
