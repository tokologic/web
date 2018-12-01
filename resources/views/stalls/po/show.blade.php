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
                        <h3 class="panel-title">PO #{{ $po->id }} ({{ title_case($po->payment_status) }})</h3>
                    </div>
                    <div class="pull-right">

                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Stall</label>
                                <p class="form-control-static">{{ $po->stall->name }}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Stall address</label>
                                <p class="form-control-static small">{{ $po->stall->address }}</p>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Delivery date</label>
                                <p class="form-control-static">{{ $po->delivery_date }}</p>
                            </div>

                            <div class="form-group">
                                <label for="description">Payment status</label>
                                <p class="form-control-static">{{ $po->payment_status }}</p>

                            </div>

                            <div class="form-group">
                                <label for="reference">Received payment</label>
                                <p class="form-control-static">{{ $po->received_payment }}</p>
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
            create("{{route('stalls.po.item.create', [$po->id])}}");
        });

        $('#btn-change').click(function () {
            bootbox.confirm({
                // title: "Destroy planet?",
                message: "Do you want make correction this PO?",
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            type: "PUT",
                            url: "{{route('stalls.po.status', [$po->id])}}",
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
                            url: "{{route('stalls.po.status', [$po->id])}}",
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
                            url: "{{route('stalls.po.status', [$po->id])}}",
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

