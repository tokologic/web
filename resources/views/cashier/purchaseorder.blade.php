@extends('cashier.layout.blankon')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>PURCHASE ORDER</h1>
        </div>
    </div>
    <div class="row">
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
@endsection

@push('scripts')
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="{{asset('js/crud.js')}}"></script>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        text: 'New PO',
                        className: 'btn-primary',
                        action: function ( e, dt, node, config ) {
                            window.location.replace('{{route('cashier.newpo')}}')
                        }
                    }
                ]
            });
        } );
    </script>
@endpush