@extends('cashier.layout.blankon')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush

@section('content')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Sunsilk</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="http://placekitten.com/200/200">
                        </div>
                        <div class="col-md-8">
                            <p>Product ID: 829</p>
                            <p>Product name: Sunsilk</p>

                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" name="qty" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Checkout</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Sub Total</p>
                            <p>Tax</p>
                            <p>Total</p>
                            <hr>
                            <p>Cash</p>
                            <p>Change</p>
                        </div>
                        <div class="col-md-6">
                            <p>{{ rupiah(500000) }}</p>
                            <p>10%</p>
                            <p>{{ rupiah(550000) }}</p>
                            <hr>
                            <input type="number" class="form-control" value="600000">
                            <p>{{ rupiah(50000) }}</p>
                        </div>
                    </div>
                    <div class="row mt-45">
                        <div class="col-md-12">
                            <button class="btn btn-block btn-primary">Save and Print</button>
                        </div>
                    </div>
                    <div class="row mt-45">
                        <div class="col-md-6">
                            <button class="btn btn-block btn-primary">Save</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-block btn-primary">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>NEW ORDER</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Item</th>
                    <th class="no-sort">Price</th>
                    <th class="no-sort">Qty</th>
                    <th class="no-sort">Sub Total</th>
                </tr>
                </thead>
                <tbody>
                    @for($i=0;$i<=10;$i++)
                    <tr>
                        <td>Sabun mandi</td>
                        <td>{{ rupiah(5000) }}</td>
                        <td>2</td>
                        <td>{{ rupiah(10000) }}</td>
                    </tr>
                        @endfor
                </tbody>
            </table>

            <div class="row mt-20">
                <div class="col-md-6">
                    <button id="checkoutOrder" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Checkout</button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block"><i class="fa fa-percent"></i> Tax</button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block"><i class="fa fa-percent"></i> Discount</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" Placeholder="Search">
            
            <div class="row mt-20">
                @for($i=0;$i<9;$i++)
                    <div class="col-md-4 mt-20">
                        <img class="item item-{{$i}}" src="http://placekitten.com/200/200">
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            $(".item").click(function(e){
                e.preventDefault();
                $("#myModal").modal('show');
            });

            $('#checkoutOrder').click(function(e){
                $("#checkoutModal").modal("show");
            });

            $('#example').DataTable({
                scrollY: '500px',
                searching: false,
                paging: false,
                ordering: true,
                columnDefs: [{
                   orderable: false,
                   targets: 'no-sort'
                }],
                info: false
            });
        } );
    </script>
@endpush