@extends('_layout.blankon')

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap.min.css')}}">
@endpush

@push('style')
    <style>

    .product-item {
        cursor: pointer;
    }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="panel shadow">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">Produk</h3>
                    </div>
                    <div class="pull-right">

                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="row mb-15">
                        <div class="col-xs-12">
                            <input type="text" class="form-control input-lg" placeholder="Cari produk">
                        </div>
                    </div>
                    <div class="row">
                        @for($i = 0; $i < 12; $i++)
                        <div class="col-md-3">
                            <div class="product-item">
                                <img src="https://picsum.photos/200?random" alt="" class="img-responsive">
                                <h3>Sunsilk</h3>
                                <h4>Rp10.000</h4>
                            </div>

                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="panel shadow">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h3 class="panel-title">Transaksi</h3>
                    </div>
                    <div class="pull-right">

                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr onclick="updateQty(this)">
                                        <td>Sunsilk</td>
                                        <td>{{rupiah(20000)}}</td>
                                        <td>7</td>
                                        <td class="text-right">{{rupiah(20000 * 7)}}</td>
                                    </tr>

                                    <tr>
                                        <td>Rejoice</td>
                                        <td>{{rupiah(20000)}}</td>
                                        <td>7</td>
                                        <td class="text-right">{{rupiah(20000 * 7)}}</td>
                                    </tr>

                                    <tr>
                                        <td>Xiaomi</td>
                                        <td>{{rupiah(20000)}}</td>
                                        <td>7</td>
                                        <td class="text-right">{{rupiah(20000 * 7)}}</td>
                                    </tr>
                                    </tbody>

                                    <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>

                                        <th class="text-right">{{rupiah(140000)}}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">PPN 10%</th>

                                        <th class="text-right">{{rupiah(140000 * 10/100)}}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Amount</th>

                                        <th class="text-right">{{rupiah(140000 + (140000 * 10/100))}}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel shadow">

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
                            <button type="button" class="btn btn-primary btn-lg btn-block">Print</button>
                        </div>

                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-lg btn-block">Discount</button>
                            <button type="button" class="btn btn-primary btn-lg btn-block">Tax</button>
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
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">--}}
    {{--<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>--}}
    {{--<script src="/vendor/datatables/buttons.server-side.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')
    {!! $dataTable->scripts() !!}

    <script>

        $('#btn-sale-add').click(function () {
            create("{{route('sales.create')}}");
        });

        function updateQty(obj) {
            $('.modal-footer').removeClass('hidden');

            let $obj = $(obj);
            $('#modal .modal-body').html('Loading, please wait...');

            $.get('{{ route('sales.update-qty') }}', function (response) {
                $('#modal .modal-body').html(response);
            });

            $('#modal').modal('show');
        }

    </script>
@endpush
