<div class="row">
    <div class="col-md-12">
        <form action="{{route('companies.store')}}" method="post" id="form-company-add"> {{csrf_field()}}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name">
                <div class="invalid-feedback"></div>
            </div>
        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-company-add', 'dataTables-company-list');
    });
</script>
