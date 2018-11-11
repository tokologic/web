<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-warning" data-route="{{route('companies.edit', $company->id)}}" onclick="edit(this)">
        Edit
    </button>
    <button type="button" class="btn btn-outline-danger" data-route="{{route('companies.destroy', $company->id)}}"
            data-table="dataTables-company-list"
            data-token="{{csrf_token()}}"
            onclick="destroy(this)">Destroy
    </button>
</div>
