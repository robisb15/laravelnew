@extends('layouts.admin.app')

@section('content')
    <div class="container p-4">
        <div class="card bg-light">
            <div class="card-body m-2">
                <div class="row">
                    <h4>Layanan {{ $pendaftaran->nama_layanan }}</h4>
                    <h5>Kode {{ $pendaftaran->kode_pendaftaran }}</h5>
                    <table class="table">
                        @foreach ($isiFormulir as $item)
                            @if ($item->jenis == 'date')
                                <tr>
                                    <td width="20%">{{ $item->nama_formulir }}</td>
                                    <td>: {{ \Carbon\Carbon::parse($item->isi)->format('d M Y') }}</td>
                                </tr>
                            @elseif($item->jenis == 'option')
                                <tr>
                                    <td width="20%">{{ $item->nama_formulir }}</td>
                                    <td>: {{ explode('.', $item->isi)[1] }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td width="20%">{{ $item->nama_formulir }}</td>
                                    <td>: {{ $item->isi }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>

                    <h5>Status Pendaftaran:</h5>
                    <h6>

                        @if($pendaftaran->status == '1')
                            <span class="badge bg-secondary">{{ $pendaftaran->nama }}</span>
                            @elseif($pendaftaran->status == '2')
                            <span class="badge bg-primary">{{ $pendaftaran->nama }}</span>
                            @elseif($pendaftaran->status == '3')
                            <span class="badge bg-warning">{{ $pendaftaran->nama }}</span>
                            @elseif($pendaftaran->status =='4')
                            <span class="badge bg-success">{{ $pendaftaran->nama }}</span>
                            @elseif($pendaftaran->status == '5')
                            <span class="badge bg-danger">{{ $pendaftaran->nama }}</span>
                            @endif
                        </h6>
                        <span>{{ $pendaftaran->keterangan }}</span>
                        <p>
                    <a href="{{ url('admin/syarat-berkas/layanan/'.$pendaftaran->id_layanan) }}" class="btn btn-info">Lihat Syarat Berkas</a>
                    </p>
                    @if ($pendaftaran->url)
                        <div class="col-md-12">
                            <span class="mt-2" style="font-size:14pt"><strong>File :</strong></span>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal-edit">
                                Lihat
                            </button>
                        </div>
                        @includeIf('admin.pengajuan.fileEdit')
                    @endif

                    <h4 class="mt-3">Berkas</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berkasUpload as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nama_file }}</td>
                                    <td>
                                        @if ($item->status_berkas == 1)
                                            <span class="badge bg-warning">Proses</span>
                                        @elseif ($item->status_berkas == 2)
                                            <span class="badge bg-success">Terima</span>
                                        @elseif ($item->status_berkas == 3)
                                            <span class="badge bg-warning">Tolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->keterangan)
                                            {{ $item->keterangan }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal-{{ $key }}">
                                            Lihat
                                        </button>
                                    </td>
                                </tr>
                                @include('admin.pengajuan.file')
                            @endforeach
                        </tbody>
                    </table>


                    @if ($pendaftaran->id_status != '4')
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Aksi
                            </button>
                            <ul class="dropdown-menu">
                                @if ($pendaftaran->id_status != '3' && $pendaftaran->id_status != '4')
                                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal-konfirmasi">
                                            Konfirmasi
                                        </button>
                                    </li>
                                @elseif($pendaftaran->id_status == 3)
                                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal-selesai">
                                            Selesai
                                        </button>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal Selesai -->
        @includeIf('admin.pengajuan.selesai')
        <!-- Modal Konfirmasi -->
        @includeIf('admin.pengajuan.konfirmasi')

    </div>
@endsection
