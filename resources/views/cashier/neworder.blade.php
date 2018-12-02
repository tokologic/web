@extends('cashier.layout.blankon')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush

@section('content')
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
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Sub Total</th>
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
                    <button class="btn btn-primary btn-block"><i class="fa fa-check"></i> Checkout</button>
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
                        <img src="http://placekitten.com/200/200">
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">--}}
    {{--<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>--}}
    {{--<script src="/vendor/datatables/buttons.server-side.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scrollY: '500px',
                searching: false,
                paging: false,
                ordering: false,
                info: false
            });
        } );
    </script>
@endpush