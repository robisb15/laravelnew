@extends('layouts.p-desa.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <center>

                <h2>Layanan</h2>
            </center>
           
             <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="row justify-content-center">

                                    @foreach ($layanan as $item)
                                    <div class="col-md-3 g-10 mt-3">
                                        <a href="{{ route('pendaftaran.layanan', [$item->id_layanan]) }}"
                                            class="btn btn-warning w-100 h-100">
                                            <div class="rounded p-3 pt-4 pb-4 m-2 d-flex flex-column align-items-center">
                                                <img src="{{ asset('img/layanan.png') }}" alt=""
                                                style="width: 100%; height: auto;">
                                                <h6>{{ $item->nama_layanan }}</h6>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

        </div>
    </div>
@endsection
