<div class="btn-group btn-group-xs" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-warning " data-route="{{route('users.edit', $user->id)}}" onclick="edit(this)">
        <i class="fa fa-pencil"></i> Edit
    </button>
    <button type="button" class="btn btn-danger" data-route="{{route('users.destroy', $user->id)}}"
            data-table="dataTables-user-list"
            data-token="{{csrf_token()}}"
            onclick="destroy(this)"> <i class="fa fa-trash"></i> Destroy
    </button>
</div>
