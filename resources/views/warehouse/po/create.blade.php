@extends('_layout.blankon')

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
                            <form action="#">

                                <div class="form-group">
                                    <label for="delivery_date">Delivery date</label>
                                    <input type="text" id="delivery_date" name="delivery_date" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="reference">Reference</label>
                                    <textarea name="reference" id="reference" class="form-control"></textarea>
                                </div>
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
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')
    <script>

    </script>
@endpush

