@extends('_layout.main')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" id="btn-user-add">
                Add user
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                {!! $dataTable->table(['class' => 'table table-bordered table-striped table-hover','id' => 'dataTables-user-list']) !!}
            </div>
        </div>
    </div>

@endsection

@push('style')
    <style>
        .btn-group-xs > .btn, .btn-xs {
            padding: .25rem .4rem;
            font-size: .875rem;
            line-height: .5;
            border-radius: .2rem;
        }

        /*https://stackoverflow.com/questions/48529880/bootbox-dialog-modal-bootstrap-4*/
        .bootbox .modal-header{
            display: block;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">--}}
    {{--<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>--}}
    {{--<script src="/vendor/datatables/buttons.server-side.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')
    {!! $dataTable->scripts() !!}

    <script>

        $('#btn-user-add').click(function () {
            create("{{route('users.create')}}");
        });

    </script>
@endpush

