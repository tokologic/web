<div class="row">
    <div class="col-md-12">
        <form action="{{route('regions.update', $region->id)}}" method="post" id="form-region-edit">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
                <label for="parent">Parent</label>
                <select name="parent_id" id="parent_id" class="form-control form-control-sm">
                    <option value="-" selected>-</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}" @if($region->parent_id == $parent->id) selected @endif>{{ $parent->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="name">Nama *</label>
                <input type="text" id="name" class="form-control form-control-sm" name="name" required value="{{ $region->name }}">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="postal_code">Kode Pos *</label>
                <input type="text" id="postal_code" class="form-control form-control-sm" name="postal_code" required value="{{ $region->postal_code }}">
                <div class="invalid-feedback"></div>

            </div>

        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-region-edit', 'dataTables-region-list');
    });
</script>
