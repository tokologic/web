@extends('cashier.layout.blankon')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>PREVIOUS ORDER</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Order</th>
                    <th class="no-sort">Cashier</th>
                    <th class="no-sort">Total</th>
                    <th class="no-sort">Cash</th>
                    <th class="no-sort">Change</th>
                    <th class="no-sort">Time</th>
                </tr>
                </thead>
                <tbody>
                @for($i=0;$i<=10;$i++)
                    <tr>
                        <td><a href="#">2323</a></td>
                        <td>Jelvin F.</td>
                        <td>{{ rupiah(550000) }}</td>
                        <td>{{ rupiah(600000) }}</td>
                        <td>{{ rupiah(50000) }}</td>
                        <td>20-08-2018 20:00:23</td>
                    </tr>
                @endfor
                </tbody>
            </table>
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
                paging: true,
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