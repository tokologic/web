@extends('_layout.blankon')

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')

    <div class="panel shadow">
        <div class="panel-heading">
            <div class="pull-left">
                <h3 class="panel-title">Stock Issuence</h3>
            </div>
            <div class="pull-right">

            </div>
            <div class="clearfix"></div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                       <table class="table table-bordered table-striped">
                           <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Bin Location</th>
                                    <th>Kios</th>
                                    <th>Action</th>
                                </tr>
                           </thead>
                           <tbody>
                           @for($i = 1; $i <= 10; $i++)
                           <tr>
                               <td>{{$i}}</td>
                               <td>Aqua 10{{$i}} ml</td>
                               <td>{{$i * 23}}</td>
                               <td>KL-09{{$i}}-VS</td>
                               <td>Kios Bidan {{$i}}
                                   <br>
                               <small>Jalan alamat raya No {{$i}}</small></td>
                               <td>
                                   <button type="button" class="btn btn-sm btn-danger">Kirim barang</button>
                               </td>
                           </tr>
                           @endfor
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

    <script>


    </script>
@endpush

