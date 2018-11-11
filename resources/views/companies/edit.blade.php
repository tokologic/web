<div class="row">
    <div class="col-md-12">
        <form action="{{route('companies.update', $company->id)}}" method="post" id="form-company-edit">
            {{csrf_field()}}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{$company->name}}">
                <div class="invalid-feedback"></div>
            </div>

        </form>
    </div>
</div>

<script>

    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        update('form-company-edit', 'dataTables-company-list')
    });
</script>
