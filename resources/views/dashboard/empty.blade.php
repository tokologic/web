@extends('_layout.blankon')

@section('content')
    <div class="panel shadow">


        <div class="panel-body">
            <div class="row text-center">
                <div class="col-md-12 ">
                    <h3>Nampaknya Anda belum mempunyai toko, silahkan buat toko terlebih dahulu dengan klil tombol
                        berikut</h3>

                    <a href="{{ route('stalls.create') }}" class="btn btn-lg btn-primary"><i class="fa fa-home"></i> Buat Toko</a>
                </div>
            </div>
        </div>
@endsection
