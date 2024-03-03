@extends('layouts.p-desa.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <h4> Pengajuan Layanan {{ $layanan->nama_layanan }}</h4>
                <br>
                <div class="col-md-12">
                    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_layanan" value="{{ $layanan->id_layanan }}">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                @if(count($rincianFormulir)>=1)
                                <h5 class="mt-3">Formulir</h5>
                                @endif
                                @foreach ($rincianFormulir as $index => $item)

                                    <div class="col-md-12 mt-1">
                                        <label for="" class="mt-3">{{ $item->nama }}</label>
                                        <input type="hidden" name="formulir[{{ $index }}][id_rincian_formulir]"
                                            value="{{ $item->id_rincian_formulir }}">
                                        @if ($item->jenis == 'textarea')
                                            <textarea name="formulir[{{ $index }}][isi] }}" class="form-control" required rows="4"></textarea>
                                        @else
                                            <input type="{{ $item->jenis }}" name="formulir[{{ $index }}][isi] }}"
                                                class="form-control" required>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-8 offset-md-2">
                                <h5 class="mt-5">Berkas yang dibutuhkan</h5>
                                @foreach ($syaratBerkas as $index => $item)
                                    <div class="row">
                                        <div class="col-md-6">

                                            <h5 for="" class="mt-3">{{ $index + 1 }}. {{ $item->nama_file }}</h5>
                                            <span>{{ $item->keterangan_file }}</span>
                                            @if ($item->wajib == 1)
                                              <span class="badge text-bg-danger">Wajib</span>
                                            @endif
                                            @if ($item->url_source != null)
                                                <br>
                                                Form:
                                                <a href="{{ url('file/format?path=' . $item->url_source) }}"
                                                    class="btn btn-sm btn-info ms-3 my-2">Download</a>
                                                <br>
                                            @endif
                                            <input type="hidden" name="id_syarat_berkas[{{ $index }}]"
                                                value="{{ $item->id_syarat_berkas }}">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-3">

                                                @if ($item->multiple_files == 1)
                                                    <input type="file" name="file[{{ $index }}][]" class="filepond"
                                                        accept="application/pdf" multiple>
                                                @else
                                                    <input type="file" name="file[{{ $index }}][]" class="filepond"
                                                        accept="application/pdf">
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <input type="submit" name="kirim" value="Kirim" class="btn btn-primary mt-3">
                        <input type="submit" name="draft" value="Draft" class="btn btn-info mt-3">
                    </form>
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
                    process: '{{ route('upload-file-temp') }}',
                    revert: '{{ route('revert') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
        });
    </script>
@endpush
