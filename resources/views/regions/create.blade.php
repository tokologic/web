<div class="row">
    <div class="col-md-12">
        <form action="{{route('regions.store')}}" method="post" id="form-region-add"> {{csrf_field()}}

            <div class="form-group">
                <label for="parent">Parent</label>
                <select name="parent" id="parent" class="form-control form-control-sm">
                    <option value="-" selected>-</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="name">Nama *</label>
                <input type="text" id="name" class="form-control form-control-sm" name="name" required>
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="postal_code">Kode Pos *</label>
                <input type="text" id="postal_code" class="form-control form-control-sm" name="postal_code" required>
                <div class="invalid-feedback"></div>

            </div>

        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-region-add', 'dataTables-region-list');
    });
</script>
