<div class="row">
    <div class="col-md-12">
        <form action="{{route('users.update', $user->id)}}" method="post" id="form-user-edit">
            {{--{{method_field('PUT')}}--}}
            {{csrf_field()}}

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" name="email" value="{{$user->email}}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="first_name">Nama depan</label>
                <input type="text" id="first_name" class="form-control" name="first_name" value="{{$user->first_name}}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="last_name">Nama belakang</label>
                <input type="text" id="last_name" class="form-control" name="last_name" value="{{$user->last_name}}">
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->slug }}"
                                @if(count($user->roles) > 0)
                                    @if($role->slug == $user->roles[0]->slug) selected @endif
                                @endif
                        >
                            {{ $role->name }}
                        </option>
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
        update('form-user-edit', 'dataTables-user-list')
    });
</script>
