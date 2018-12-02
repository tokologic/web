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
                        <h3 class="panel-title">Sale #{{ $sale->id }}</h3>
                    </div>
                    <div class="pull-right">

                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Payment method</label>
                                <p class="form-control-static">{{ $sale->payment_method }}</p>
                            </div>

                            <div class="form-group">
                                <label for="description">Amount</label>
                                <p class="form-control-static">{{ $sale->amount }}</p>

                            </div>

                            <div class="form-group">
                                <label for="reference">Cash</label>
                                <p class="form-control-static">{{ $sale->cash }}</p>
                            </div>

                            <div class="form-group">
                                <label for="reference">Change</label>
                                <p class="form-control-static">{{ $sale->change }}</p>
                            </div>

                            <div class="form-group">
                                <label for="reference">Tax</label>
                                <p class="form-control-static">{{ $sale->tax }}%</p>
                            </div>

                            <div class="form-group">
                                <label for="reference">Info</label>
                                <p class="form-control-static">{{ $sale->info }}</p>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" id="btn-sale-item-add">
                            <i class="fa fa-plus"></i> Add item
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-ressalensive">
                                {!! $dataTable->table(['class' => 'table table-bordered table-striped table-hover','id' => 'dataTables-sale-item-list']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 text-left">
                            <h3>Total </h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <h3>{{ rupiah($sale->amount) }}</h3>
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
        $('#btn-sale-item-add').click(function () {
            create("{{route('sale.item.create', [$sale->id])}}");
        });
    </script>
@endpush

