@extends('_layout.main')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" id="btn-price-add">
                Add price
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                {!! $dataTable->table(['class' => 'table table-bordered table-striped table-hover table-sm','id' => 'dataTables-price-list']) !!}
            </div>
        </div>
    </div>

@endsection

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

        $('#btn-price-add').click(function () {
            create("{{route('prices.create')}}");
        });

    </script>
@endpush

