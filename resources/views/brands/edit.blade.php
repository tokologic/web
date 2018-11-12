<div class="row">
    <div class="col-md-12">
        <form action="{{route('brands.update', $brand->id)}}" method="post" id="form-brand-edit">
            {{csrf_field()}}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="{{$brand->name}}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="company">Supplier</label>
                <select name="company" id="company" class="form-control">
                    <option value="0">-Choose supplier-</option>
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>
            </div>
        </form>
    </div>
</div>

<script>

    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        update('form-brand-edit', 'dataTables-brand-list')
    });
</script>
