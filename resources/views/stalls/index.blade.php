@extends('_layout.blankon')

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
    <div class="alert alert-info hidden">

    </div>
    <div class="panel shadow">
        <div class="panel-heading">
            <div class="pull-left">
                <h3 class="panel-title">Kios</h3>
            </div>
            <div class="pull-right">
                @if(Sentinel::hasAnyAccess(['stall.create']))
                <button type="button" class="btn btn-primary" data-toggle="modal" id="btn-store-add">
                    <i class="fa fa-plus"></i> Tambah Kios
                </button>
                @endif
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        {!! $dataTable->table(['class' => 'table table-bordered table-striped table-hover','id' => 'dataTables-store-list']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/js/dataTables.bootstrap.min.js')}}"></script>
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">--}}
    {{--<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>--}}
    {{--<script src="/vendor/datatables/buttons.server-side.js"></script>--}}
    <script src="{{asset('vendor/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')
    {!! $dataTable->scripts() !!}

    <script>

        $('#btn-store-add').click(function () {
            create("{{route('stalls.create')}}");
        });


        function pay(obj) {
            $('.modal-footer').removeClass('hidden');

            let $obj = $(obj);
            $('#modal .modal-body').html('Loading, please wait...');

            $.get($obj.data('route'), function (response) {
                $('#modal .modal-body').html(response);
            });

            $('#modal').modal('show');
        }

    </script>
@endpush
