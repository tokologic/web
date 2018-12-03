@extends('_layout.blankon')

@push('styles')
ccc
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
                            <form action="{{route('stalls.po.store')}}" method="post" id="form-po-create">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label for="store">Stall</label>
                                    <select id="store" name="store_id"></select>
                                </div>

                                <div class="form-group">
                                    <label for="delivery_date">Delivery date</label>
                                    <input type="text" id="delivery_date" name="delivery_date" class="form-control" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" id="amount" name="amount" class="form-control" autocomplete="off">
                                </div>

                                <div class="btn-group pull-right" role="group" aria-label="Action">
                                    <button type="submit" class="btn btn-success " id="btn-new">
                                        <i class="fa fa-floppy-o"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
            // format: 'mm-dd-yyyy',
            todayBtn: 'linked',
            autoclose: true
        });

        $('#store').select2({
            ajax: {
                url: '{{route('stalls.select')}}',
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
