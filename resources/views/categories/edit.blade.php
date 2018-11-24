<div class="row">
    <div class="col-md-12">
        <form action="{{route('categories.update', $category->id)}}" method="post" id="form-category-edit">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control form-control-sm" name="name" value="{{ $category->name }}">
                <div class="invalid-feedback"></div>
            </div>

        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-category-edit', 'dataTables-category-list');
    });
</script>
