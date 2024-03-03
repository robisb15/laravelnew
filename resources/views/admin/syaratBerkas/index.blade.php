@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <h3 class="py-3">Syarat Berkas</h3>
        <div class="row">
             @if(count($syaratBerkas) == 0)
            <h1>Tidak ada layanan</h1>
            @endif
            @foreach ($syaratBerkas as $item)
                <div class="col-md-4 bg-info rounded p-4 m-2">
                    <a href="{{ route('syarat-berkas.layanan', [$item->id_layanan]) }}">
                        <div class="d-grid align-items-center">
                            <h5>{{ $item->nama_layanan }}</h5>
                            <h6>Jumlah Berkas {{ $item->jumlahBerkas }}</h6>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
