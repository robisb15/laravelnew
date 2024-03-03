@extends('layouts.p-desa.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h4>Layanan {{ $pendaftaran->nama_layanan }}</h4>
                        </div>

                        <div class="col-md-1">
                            @if ($pendaftaran->status == '1' || $pendaftaran->status == '5')
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                    data-bs-target="#kirimModal">
                                    Kirim
                                </button>
                            @endif
                            @includeIf('p-desa.pendaftaran.kirim')
                        </div>
                        <div class="col-md-10 offset-md-1">
                            <h5>Kode {{ $pendaftaran->kode_pendaftaran }}</h5>
                            @if(count($isiFormulir)>=1)
                            @if ($pendaftaran->status == '1' || $pendaftaran->status == '5')
                                <a href="{{ route('pendaftaran.edit', [$pendaftaran->id_pendaftaran]) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                            @endif
                            @endif
                            
                            <table class="table table-responsive">
                                @foreach ($isiFormulir as $item)
                                    <tr>
                                        <td width="20%">{{ $item->nama_formulir }}</td>
                                        <td>:
                                            @if ($item->jenis == 'date')
                                                {{ \Carbon\Carbon::parse($item->isi)->format('d M Y') }}
                                            @elseif($item->jenis == 'option')
                                                {{ explode('.', $item->isi)[1] }}
                                            @else
                                                {{ $item->isi }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1">

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
    
                        keterangan : <span >{{ $pendaftaran->keterangan }}</span>
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
                    </div>


                    @if ($pendaftaran->status == '3' || $pendaftaran->status == '4')
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
                                            @if ($pendaftaran->status == '1')
                                                <span class="badge text-bg-secondary">Draft</span>
                                            @elseif ($item->status_berkas == 1)
                                                <span class="badge text-bg-primary">Proses</span>
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
                    @else
                        <div class="row">
                            @foreach ($syaratBerkas as $index => $item)
                                <div class="col-md-8 offset-md-2 mt-3">
                                    <h6 for="" class="mt-3">{{ $index + 1 }}. {{ $item->nama_jenis_file }}
                                    </h6>
                                  

                                        <p>{{ $item->jenis_jenis_file }}</p>
                                        @if ($item->wajib == 1)
                                            <span class="badge text-bg-danger">Wajib</span>
                                        @endif
                                   

                                        @php
                                            $statusBerkas = 1;
                                            if (isset($berkasUpload[$item->id_syarat_berkas])) {
                                                foreach ($berkasUpload[$item->id_syarat_berkas] as $item) {
                                                    if ($item->status_berkas == 3) {
                                                        $statusBerkas = 3;
                                                    }
                                                    elseif($item->status_berkas == 2){
                                                        $statusBerkas = 2;
                                                    }
                                                }
                                            } else {
                                            }
                                        @endphp
                                        @if (
                                            $pendaftaran->status == '1' ||
                                                $statusBerkas == 3 || ($statusBerkas == 1 && $pendaftaran->status == '5')||
                                                (isset($berkasUpload[$item->id_syarat_berkas]) == false && $pendaftaran->status == '5'))
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editModal-{{ $index }}">
                                                Edit
                                            </button>
                                            @include('p-desa.pendaftaran.editfile')
                                        @endif
                                   
                                    @if (isset($berkasUpload[$item->id_syarat_berkas]))
                                        <table class="table table-responsive">
                                            @foreach ($berkasUpload[$item->id_syarat_berkas] as $key => $berkas)
                                                <tr>
                                                    <td width="70%">{{ $berkas->nama_file }}
                                                    <p>@if ($item->keterangan)
                                                {{ $item->keterangan }}
                                            @else
                                                -
                                            @endif</p></td>
                                                      
                                                    <td> 
                                            @if ($pendaftaran->status == '1')
                                                <span class="badge text-bg-secondary">Draft</span>
                                            @elseif ($berkas->status_berkas == 1)
                                                <span class="badge text-bg-primary">Proses</span>
                                            @elseif ($item->status_berkas == 2)
                                                <span class="badge text-bg-success">Terima</span>
                                            @elseif ($item->status_berkas == 3)
                                                <span class="badge text-bg-danger">Tolak</span>
                                            @endif
                                        </td>
                                       
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-info"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal-{{ $berkas->id_berkas_upload }}">
                                                            Lihat
                                                        </button>

                                                    </td>
                                                </tr>
                                                @include('p-desa.pendaftaran.fileView')
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        const inputElements = document.querySelectorAll('input[type="file"].filepond');

        inputElements.forEach((inputElement, index) => {
            FilePond.create(inputElement, {
                acceptedFileTypes: ['application/pdf'],
                credits: false,
                server: {
                    process: '{{ route('upload-editFile') }}',
                    revert: '{{ route('revert') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
        });
    </script>
@endpush
