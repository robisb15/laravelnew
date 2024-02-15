@extends('layouts.p-desa.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Layanan {{ $pendaftaran->nama_layanan }}</h4>
                    <h5>Kode {{ $pendaftaran->kode_pendaftaran }}</h5>
                    @if ($pendaftaran->status == '1' || $pendaftaran->status == '5')
                        <a href="{{ route('pendaftaran.edit', [$pendaftaran->id_pendaftaran]) }}" class="btn btn-sm btn-warning">Edit</a>
                    @endif
                    <table class="table table-responsive">
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

                        <span class="badge bg-warning">{{ $pendaftaran->nama }}</span>
                    </h6>
                    <p><span>{{ $pendaftaran->keterangan }}</span>
                    </p>
                    @if ($pendaftaran->url)
                       <div class="col-md-12 mt-3">
                            <span class="mt-2" style="font-size:14pt"><strong>File :</strong></span>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal-selesai">
                                Lihat
                            </button>
                        </div>
                        @includeIf('p-desa.pendaftaran.fileBerkas')
                    @endif
                    <h4 class="mt-3">Berkas Upload</h4>

                    @if ($pendaftaran->status == '1' || $pendaftaran->status == '5')
                        <a href="{{ route('pendaftaran.editBerkas', [$pendaftaran->id_pendaftaran]) }}"class="btn btn-sm btn-warning">Edit</a>
                    @endif

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama File</th>
                                <th scope="col">Status</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Lihat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berkasUpload as $index => $item)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $item->nama_file }}</td>
                                    <td>
                                        @if ($item->status_berkas == 1)
                                            <span class="badge text-bg-secondary">Proses</span>
                                        @elseif ($item->status_berkas == 2)
                                            <span class="badge text-bg-success">Terima</span>
                                        @elseif ($item->status_berkas == 3)
                                            <span class="badge text-bg-danger">Tolak</span>
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
                                            data-bs-target="#exampleModal-{{ $index }}">
                                            Lihat
                                        </button>
                                    </td>
                                </tr>
                                @include('p-desa.pendaftaran.file')
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
