<div class="row">
    <div class="col-md-12">
        <form action="{{route('warehouses.update', $warehouse->id)}}" method="post" id="form-warehouse-edit">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
                <label for="region_id">Region</label>
                <select name="region_id" id="region_id" class="form-control form-control-sm">
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}" @if($warehouse->region_id == $region->id) selected @endif>{{ $region->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" class="form-control form-control-sm" name="name" value="{{ $warehouse->name }}">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="address">Address *</label>
                <textarea name="address" id="address" cols="30" rows="10" class="form-control form-control-sm">{{ $warehouse->address }}</textarea>
                <div class="invalid-feedback"></div>

            </div>

        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-warehouse-edit', 'dataTables-warehouse-list');
    });
</script>
