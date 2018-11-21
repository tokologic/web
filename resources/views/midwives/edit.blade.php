<div class="row">
    <div class="col-md-12">
        <form action="{{route('midwives.update', [$midwife->id])}}" method="post" id="form-midwife-edit">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" name="email" value="{{$midwife->email}}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="first_name">Nama depan</label>
                <input type="text" id="first_name" class="form-control" name="first_name" value="{{$midwife->first_name}}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="last_name">Nama belakang</label>
                <input type="text" id="last_name" class="form-control" name="last_name" value="{{$midwife->last_name}}">
                <div class="invalid-feedback"></div>
            </div>

        </form>
    </div>
</div>

<script>

    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        update('form-midwife-edit', 'dataTables-midwife-list')
    });
</script>
