@extends('_layout.blankon')

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap.min.css')}}">
@endpush

@push('style')
    <style>
        #dataTables-po-item-list tr {
            cursor: pointer;
        }
    </style>
@endpush

@section('content')

    <input type="hidden" id="selected-po-item-id">

    <div class="panel shadow">
        <div class="panel-heading">
            <div class="pull-left">
                <h3 class="panel-title">PO #{{$po->id}} - GR #{{$po->gr->id}}</h3>
            </div>
            <div class="pull-right">

            </div>
            <div class="clearfix"></div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <h3>Delivery date: {{$po->delivery_date}}</h3>
                    <h3>Amount: {{rupiah($po->amount)}}</h3>
                    <h3>Status GR: {{$po->gr->status}}</h3>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel shadow">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">PO Item</h3>
                    </div>
                    <div class="pull-right">

                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                {!! $dataTable->table(['class' => 'table table-bordered table-striped table-hover','id' => 'dataTables-po-item-list']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel shadow">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">PO Item Goods Receiving</h3>
                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary" disabled data-toggle="modal" id="btn-gr-item-add">
                            <i class="fa fa-plus"></i> Add GR Item
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table id="dataTables-gr-item-list" class="table table-bordered table-striped table-hover" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Qty</th>
                                        <th>Reference</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    {{--<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>--}}
    {{--<script src="/vendor/datatables/buttons.server-side.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')

    {!! $dataTable->scripts() !!}

    <script>
         window.LaravelDataTables['dataTables-gr-item-list'] = $('#dataTables-gr-item-list').DataTable({

            "serverSide":true,
            "processing":true,
            "ajax": {
                "url":"{{route('warehouse.gr.item.datatables', [$po->id])}}",
                "data": function(d) {
                    d.item = $('#selected-po-item-id').val()
                },
                "type":"GET"
            },
            "columns":[
                {"name":"id","data":"id","title":"#","orderable":true,"searchable":false},
                {"name":"qty","data":"qty","title":"Qty","orderable":true,"searchable":true},
                {"name":"reference","data":"reference","title":"Reference","orderable":true,"searchable":true}
            ]
        });



        window.LaravelDataTables['dataTables-po-item-list'].on('click', 'tbody tr', function () {
            let idPOItem = $(this).children().first().text();

            $('#btn-gr-item-add').removeAttr('disabled');

            $('#selected-po-item-id').val(idPOItem);
            window.LaravelDataTables['dataTables-gr-item-list'].ajax.reload(null, false);
        });

        $('#btn-gr-item-add').click(function () {
            let poItemId = $('#selected-po-item-id').val();
            create("{{route('warehouse.gr.item.create', [$po->id])}}?po_item_id=" + poItemId);
        });
    </script>
@endpush

