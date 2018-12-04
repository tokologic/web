@extends('_layout.blankon')

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
    <div class="panel shadow">
        <div class="panel-heading">
            <div class="pull-left">
                <h3 class="panel-title">Riwayat Transaksi</h3>
            </div>
            <div class="pull-right">

            </div>
            <div class="clearfix"></div>
        </div>

        <div class="panel-body">

            <div class="row mb-15">
                <div class="col-md-4">
                    <form class="form-horizontal">
                        <div class="form-group form-group-sm">
                            <label for="inputEmail3" class="col-sm-2 control-label">Date begin</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="inputPassword3" class="col-sm-2 control-label">Date end</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>

                    </form>
                </div>

                <div class="col-md-4">
                    <form class="form-horizontal">
                        <div class="form-group form-group-sm">
                            <label for="inputEmail3" class="col-sm-2 control-label">Total min</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="inputPassword3" class="col-sm-2 control-label">Total max</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>

                    </form>
                </div>

                <div class="col-md-4">
                    <form class="form-horizontal">


                        <button type="button" class="btn btn-warning btn-sm pull-right">Search</button>

                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Cashier</th>
                                <th>Total</th>
                                <th>Cash</th>
                                <th>Change</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>343</td>
                                <td>Budi</td>
                                <td>{{rupiah(90000)}}</td>
                                <td>{{rupiah(100000)}}</td>
                                <td>{{rupiah(10000)}}</td>
                                <td>{{\Carbon\Carbon::yesterday()->toDateString()}}</td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-info">Show</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')
    {{--{!! $dataTable->scripts() !!}--}}

    <script>



    </script>
@endpush

