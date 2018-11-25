<div class="row">
    <div class="col-md-12">
        <form action="{{route('users.store')}}" method="post" id="form-user-add"> {{csrf_field()}}

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control form-control-sm" name="email" autocomplete="off">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="first_name">Nama depan</label>
                <input type="text" id="first_name" class="form-control form-control-sm" name="first_name">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="last_name">Nama belakang</label>
                <input type="text" id="last_name" class="form-control form-control-sm" name="last_name">
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control form-control-sm">
                    @foreach($roles as $role)
                        <option value="{{ $role->slug }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback"></div>

            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control form-control-sm" name="password" autocomplete="off">
                <div class="invalid-feedback"></div>

            </div>
        </form>
    </div>
</div>

<script>
    $('#modal .btn-save').on('click', function (event) {
        event.preventDefault();
        store('form-user-add', 'dataTables-user-list');
    });
</script>
