@extends('cashier.layout.blankon')

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-datepicker-vitalets/css/datepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>New PO</h1> <button class="btn btn-primary" style="float:right;">New PO Item</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="po_id">PO ID</label>
                <p>#PO-123</p>
                <input type="text" style="display:none;" name="po_id" class="form-control" value="#PO-123">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="amount">Amount</label>
                <p>{{ rupiah(4000000) }}</p>
                <input type="text" style="display:none;" name="amount" class="form-control" value="40000000">
            </div>
        </div>
        <div class="col-md-6 mt-20">
            <div class="form-group">
                <label for="delivery_date">Delivery date</label>
                <input type="text" id="delivery_date" class="form-control" placeholder="Delivery date">
            </div>
        </div>
        <div class="col-md-6 mt-20">
            <div class="form-group">
                <label for="payment_status">Payment status</label>
                <p>unpaid</p>
                <input type="text" name="payment_status" style="display:none;" value="unpaid">
            </div>
        </div>
    </div>
    <div class="row mt-45">
        <div class="col-md-12">
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Name (Job title)</th>
                    <th>Age</th>
                    <th>Nickname</th>
                    <th>Employee</th>
                </tr>
                </thead>
                <tbody>
                @for($i=0;$i<=10;$i++)
                    <tr>
                        <td>Glacomo Gulizzoni <br>Founder & CEO</td>
                        <td>40</td>
                        <td>Peldi</td>
                        <td><input type="radio"></td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-45">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-block btn-default">Save Draft</button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-block btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('vendor/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scrollY: 250
            });
            $('#delivery_date').datepicker({
                // format: 'mm-dd-yyyy',
                todayBtn: 'linked',
                autoclose: true
            });
        } );
    </script>
@endpush