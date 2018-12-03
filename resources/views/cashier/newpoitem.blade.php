@extends('cashier.layout.blankon')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <style>
        .card-header {
            background: grey;
            color: white;
            font-size: 20px;
            height: 30px;
        }

        .card-body {
            text-align: center;
            border: 1px grey solid;
        }

        .card-body img {
            margin-top: 20px;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>New PO Item</h1>
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
    <div class="col-md-6">
        <div id="detail-item">
            <div class="card">
                <div class="card-header">
                    Sunsilk
                </div>
                <div class="card-body">
                    <img src="http://placekitten.com/400/400" alt="">
                    <h5 class="card-title">Product ID: 829</h5>
                    <p class="card-text">Product name: Sunsilk</p>
                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" min="0" class="form-control">
                    </div>
                    <a href="#" class="btn btn-primary">Simpan</a>
                </div>
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
                ordering: true,
                columnDefs: [{
                    orderable: false,
                    targets: 'no-sort'
                }],
                info: false
            });
        } );
    </script>
@endpushs