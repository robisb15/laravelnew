@extends('layouts.p-desa.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row justify-content-center">
                            <div class="col-md-2 bg-warning rounded p-3 m-2">
                                <h5>Total Pengajuan</h5>
                                <h4>{{ $totalTotal }}</h4>
                            </div>
                            <div class="col-md-2 bg-warning rounded p-3 m-2">
                                <h5>Total Pengajuan Terkirim</h5>
                                <h4>{{ $totalBelumProses }}</h4>
                            </div>
                            <div class="col-md-2 bg-warning rounded p-3 m-2">
                                <h5>Total Pengajuan Diproses</h5>
                                <h4>{{ $totalProses }}</h4>
                            </div>
                            <div class="col-md-2 bg-warning rounded p-3 m-2">
                                <h5>Total Pengajuan Selesai</h5>
                                <h4>{{ $totalSelesai }}</h4>
                            </div>
                            <div class="col-md-2 bg-warning rounded p-3 m-2">
                                <h5>Total Pengajuan Tolak</h5>
                                <h4>{{ $totalTolak }}</h4>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h3 style="text-align: center;">Selamat datang di AYUNDA! </h3>
                                <p>Di sini, kami berkomitmen untuk memberikan pelayanan terbaik dalam mengelola data
                                    kependudukan. Temukan informasi terkini, ajukan permohonan dengan mudah, dan nikmati
                                    layanan cepat dan aman. Selalu siap membantu kebutuhan administratif Anda. Selamat
                                    menggunakan aplikasi AYUNDA!</p>
                            </div>
                        </div>

                        <div class="row">
                            <hr style="color: black; size:8px; ">
                            <h5 style="text-align: center;">LAYANAN YANG KAMI SEDIAKAN SAAT INI :</h5>
                        </div>
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
            </div>
        </div>
    </div>
@endsection
