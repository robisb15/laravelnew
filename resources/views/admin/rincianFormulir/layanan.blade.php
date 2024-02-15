@extends('layouts.admin.app')
@section('content')
    <div class="container">
        <h3 class="py-3">Formulir</h3>
        <div class="row ">
            @foreach ($rincianFormulir as $item)
                <div class="col-md-4 col-lg-4 bg-info rounded p-4 m-2 ">

                    <a href="{{ route('rincian-formulir.layanan', [$item->id_layanan]) }}">

                        <div class="d-grid align-items-center">
                            <h5>{{ $item->nama_layanan }}</h5>
                            <h6>Jumlah Form {{ $item->jumlahForm }}</h6>
                        </div>

                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
