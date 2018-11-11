<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-warning" data-route="{{route('users.edit', $user->id)}}" onclick="edit(this)">
        Edit
    </button>
    <button type="button" class="btn btn-outline-danger" data-route="{{route('users.destroy', $user->id)}}"
            data-table="dataTables-user-list"
            data-token="{{csrf_token()}}"
            onclick="destroy(this)">Destroy
    </button>
</div>
