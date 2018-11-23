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
                        <h3 class="panel-title">New Purchase Order</h3>
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
                            </div>

                            <div class="form-group">
                                <label class="control-label">Warehouse</label>
                                <p class="form-control-static">{{ $po->warehouse->name }}</p>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" id="btn-po-item-add">
                            <i class="fa fa-plus"></i> Add item
                        </button>
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
    </script>
@endpush

