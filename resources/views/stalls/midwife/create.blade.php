@extends('_layout.blankon')

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
    <div class="alert alert-info hidden">

    </div>
    <div class="panel shadow">
        <div class="panel-heading">
            <div class="pull-left">
                <h3 class="panel-title">Stalls</h3>
            </div>
            <div class="pull-right">

            </div>
            <div class="clearfix"></div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('stalls.store')}}" method="post" id="form-store-add"> {{csrf_field()}}

                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" id="name" class="form-control form-control-sm" name="name">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="region_id">Region</label>
                            <select name="region_id" id="region_id" class="form-control form-control-sm">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>



                        <div class="form-group">
                            <label for="address">Address *</label>
                            <textarea name="address" id="address" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="acreage">Acreage *</label>
                            <div class="input-group">
                                <input type="number" min="1" id="acreage" class="form-control form-control-sm" name="acreage">
                                <span class="input-group-addon" id="acreage-addon">m&sup2;</span>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>



                        <div class="form-group">
                            <label for="package">Package</label>
                            <br><small>Untuk informasi paket lebih lengkap silahkan klik link <a href="#">berikut</a>.</small>
                            <select name="package_id" id="package" class="form-control">
                                @foreach($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }} - {{ rupiah($package->price) }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" id="latitude" class="form-control form-control-sm" name="latitude">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" id="longitude" class="form-control form-control-sm" name="longitude">
                            <div class="invalid-feedback"></div>
                        </div>

                        <img src="{{ asset('img/map-dummy.png') }}" alt="Map" class="img-responsive">


                        <button type="submit" class="btn btn-success pull-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
@endpush

@push('script')


@endpush
