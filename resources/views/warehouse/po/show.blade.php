@extends('_layout.blankon')

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-4">

            <div class="panel shadow">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">PO #{{ $po->id }} ({{ title_case($po->status) }})</h3>
                    </div>
                    <div class="pull-right">

                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Supplier</label>
                                <p class="form-control-static">{{ $po->supplier->name }}</p>
                                <p class="form-control-static small">{{ $po->supplier->address }}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Warehouse</label>
                                <p class="form-control-static">{{ $po->warehouse->name }}</p>
                                <p class="form-control-static small">{{ $po->warehouse->address }}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Delivery date</label>
                                <p class="form-control-static">{{ $po->delivery_date }}</p>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <p class="form-control-static">{{ $po->description }}</p>

                            </div>

                            <div class="form-group">
                                <label for="reference">Reference</label>
                                <p class="form-control-static">{{ $po->reference }}</p>
                            </div>

                            @if($po->status == 'draft')
                                <button type="button" class="btn btn-success" id="btn-new">
                                    <i class="fa fa-floppy-o"></i> New
                                </button>
                            @endif

                            @if($po->status == 'new')
                            <button type="button" class="btn btn-success" id="btn-issued">
                                <i class="fa fa-check"></i> Issued
                            </button>

                            <a href="{{route('warehouse.po.download', [$po->id])}}" class="btn btn-danger" id="btn-issued">
                                <i class="fa fa-file-pdf-o"></i> Download PDF
                            </a>
                            @endif

                            @if($po->status == 'issued')
                            <button type="button" class="btn btn-primary" id="btn-new">
                                <i class="fa fa-money"></i> Approve
                            </button>
                            @endif

                            @if($po->status == 'issued')
                                <button type="button" class="btn btn-warning" id="btn-change">
                                    <i class="fa fa-money"></i> Change
                                </button>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-8">
            <div class="panel shadow">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">Items</h3>
                    </div>
                    <div class="pull-right">
                        @if(in_array($po->status, ['draft','new']))
                        <button type="button" class="btn btn-primary" data-toggle="modal" id="btn-po-item-add">
                            <i class="fa fa-plus"></i> Add item
                        </button>
                        @endif
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

                    <div class="row">
                        <div class="col-md-6 text-left">
                            <h3>Total </h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <h3>{{ rupiah($po->amount) }}</h3>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="{{asset('vendor/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')
    {!! $dataTable->scripts() !!}

    <script>
        $('#btn-po-item-add').click(function () {
            create("{{route('warehouse.po.item.create', [$po->id])}}");
        });

        $('#btn-change').click(function () {
            bootbox.confirm({
                // title: "Destroy planet?",
                message: "Do you want make correction this PO?",
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            type: "PUT",
                            url: "{{route('warehouse.po.status', [$po->id])}}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                status: 'correction'
                            },
                            success: function (data) {
                                window.location.href = data
                            },
                            error: function (r) {

                            }
                        });

                    }
                }
            })


        });

        $('#btn-new').click(function () {
            bootbox.confirm({
                // title: "Destroy planet?",
                message: "Do you want make new this PO?",
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            type: "PUT",
                            url: "{{route('warehouse.po.status', [$po->id])}}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                status: 'new'
                            },
                            success: function (data) {
                                window.location.href = data
                            },
                            error: function (r) {

                            }
                        });

                    }
                }
            })


        });

        $('#btn-issued').click(function () {
            bootbox.confirm({
                // title: "Destroy planet?",
                message: "Do you want issued this PO?",
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            type: "PUT",
                            url: "{{route('warehouse.po.status', [$po->id])}}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                status: 'issued'
                            },
                            success: function (data) {
                                window.location.href = data
                            },
                            error: function (r) {

                            }
                        });

                    }
                }
            })


        });
    </script>
@endpush

