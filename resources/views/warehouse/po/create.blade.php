@extends('_layout.blankon')

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-datepicker-vitalets/css/datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
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
                            <form action="{{route('warehouse.po.store')}}" method="post">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select id="supplier" name="supplier"></select>
                                </div>

                                <div class="form-group">
                                    <label for="warehouse">Warehouse</label>
                                    <select id="warehouse" name="warehouse"></select>
                                </div>

                                <div class="form-group">
                                    <label for="delivery_date">Delivery date</label>
                                    <input type="text" id="delivery_date" name="delivery_date" class="form-control" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="reference">Reference</label>
                                    <textarea name="reference" id="reference" class="form-control"></textarea>
                                </div>

                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-floppy-o"></i> Save
                                </button>
                            </form>
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
                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Add Item
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body"></div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="{{asset('vendor/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')
    <script>
        $('#delivery_date').datepicker({
            format: 'mm-dd-yyyy',
            todayBtn: 'linked',
            autoclose: true
        });

        $('#supplier').select2({
            ajax: {
                url: '{{route('suppliers.select')}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data.data
                    };
                }
            },
            placeholder: 'Search for a repository',
            minimumInputLength: 1,
            templateResult: function (repo) {
                if (repo.loading)
                    return repo.text;

                return repo.name;
            },
            templateSelection: function (repo) {
                return repo.name;
            },
            escapeMarkup: function (markup) {
                return markup;
            }
        });

        $('#warehouse').select2({
            ajax: {
                url: '{{route('warehouses.select')}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data.data
                    };
                }
            },
            placeholder: 'Search for a repository',
            minimumInputLength: 1,
            templateResult: function (repo) {
                if (repo.loading)
                    return repo.text;

                return repo.name;
            },
            templateSelection: function (repo) {
                return repo.name;
            },
            escapeMarkup: function (markup) {
                return markup;
            }
        });

    </script>
@endpush

