@extends('layouts.p-desa.app')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    Edit {{ $pendaftaran->kode_pendaftaran }}
                    <br>
                    <form action="{{ route('pendaftaran.updateBerkas',[$pendaftaran->id_pendaftaran]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       @method('PUT')


                    <h4 class="mt-3">Berkas yang dibutuhkan</h4>
                    <div class="row">

                        @foreach ($syaratBerkas as $index => $item)
                        <input type="hidden" name="id_syarat_berkas[{{ $index }}]" value="{{ $item->id_syarat_berkas }}">
                            <div class="col-md-12">
                                <div class="row">

                                </div>

                                <h5 for="" class="mt-3">{{ $index + 1 }}. {{ $item->nama_file }} </h5>
                                <span>{{ $item->keterangan_file }}</span>

                                @if ($item->wajib == 1)
                                    <span>Wajib</span>
                                @endif
                                @if ($item->url_source != null)
                                    <br>
                                    Form:
                                    <a href="{{ url('file/format?path=' . $item->url_source) }}"
                                        class="btn btn-sm btn-info ms-3 my-2">Download</a>
                                    <br>
                                @endif
                                <input type="file" name="file[{{ $index }}][file]" class="form-control" accept="application/pdf">
                            </div>
                        @endforeach
                    </div>

                    <input type="submit" name="draft" value="Draft" class="btn btn-info mt-3">
                    <input type="submit" name="kirim" value="Kirim" class="btn btn-primary mt-3">

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
