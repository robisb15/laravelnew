@extends('layouts.p-desa.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-2 bg-info rounded p-3 m-2">
                                        <h5>Total Pengajuan</h5>
                                        <h4>{{ $totalTotal }}</h4>
                                    </div>
                                    <div class="col-3 bg-info rounded p-3 m-2">
                                        <h5>Total Pengajuan Selesai</h5>
                                        <h4>{{ $totalSelesai }}</h4>
                                    </div>
                                    <div class="col-3 bg-info rounded p-3 m-2">
                                        <h5>Total Pengajuan Diproses</h5>
                                        <h4>{{ $totalProses }}</h4>
                                    </div>
                                    <div class="col-3 bg-info rounded p-3 m-2">
                                        <h5>Total Pengajuan Tolak</h5>
                                        <h4>{{ $totalTolak }}</h4>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <h3 style="text-align: center;">Selamat datang di Dukcapil Layanan Terkini! Di sini,</h3>
                                <p>kami berkomitmen untuk memberikan pelayanan terbaik dalam mengelola data kependudukan.
                                    Temukan informasi terkini, ajukan permohonan dengan mudah, dan nikmati layanan cepat dan
                                    aman.
                                    Selalu siap membantu kebutuhan administratif Anda. Selamat menggunakan layanan Dukcapil!
                                </p>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <hr style="color: black; size:8px; ">
                                <h5 style="text-align: center;">LAYANAN YANG KAMI SEDIAKAN SAAT INI :</h5>
                            </div>
                            <div class="row justify-content-center">
                                @foreach ($layanan as $item)
                                    <div class="col-5">
                                        <a href="{{ route('pendaftaran.layanan',[$item->id_layanan]) }}" class="btn btn-info w-100 m-3">
                                            <div class="col-12  rounded p-3 pt-4 pb-4 m-2">
                                               <h5> {{ $item->nama_layanan }}</h5>
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
@endsection
