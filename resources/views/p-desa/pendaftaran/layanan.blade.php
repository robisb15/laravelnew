@extends('layouts.p-desa.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <h4> Pengajuan Layanan {{ $layanan->nama_layanan }}</h4>
                <br>
                <div class="col-md-6">
                    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_layanan" value="{{ $layanan->id_layanan }}">
                        <div class="row ">
                            @foreach ($rincianFormulir as $index => $item)
                                @if ($item->jenis == 'option')
                                    <div class="col-md-12 mt-3">
                                        <label for="" class="mt-3">{{ $item->nama }}</label>
                                        <input type="hidden" name="formulir[{{ $index }}][id_rincian_formulir]"
                                            value="{{ $item->id_rincian_formulir }}">
                                        <select name="formulir[{{ $index }}][isi]" id=""
                                            class="form-control" required>
                                            @foreach ($i = json_decode($item->isi) as $item)
                                                <option value="{{ $item->value . '.' . $item->name }}">{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                @elseif($item->jenis == 'textarea')
                                    <div class="col-md-12 mt-3">
                                        <input type="hidden" name="formulir[{{ $index }}][id_rincian_formulir]"
                                            value="{{ $item->id_rincian_formulir }}">
                                        <label for="">{{ $item->nama }}</label>
                                        <textarea name="formulir[{{ $index }}][isi] }}" class="form-control" required rows="4"></textarea>

                                    </div>
                                     @elseif($item->jenis == 'date'||$item->jenis == 'number')
                                     <div class="col-md-12 mt-3">

                                        <label for="" class="mt-3">{{ $item->nama }}</label>
                                        <input type="hidden" name="formulir[{{ $index }}][id_rincian_formulir]"
                                            value="{{ $item->id_rincian_formulir }}">
                                        <input type="{{ $item->jenis }}" name="formulir[{{ $index }}][isi] }}"
                                            class="form-control" required>
                                    </div>
                            
                                @else
                                    <div class="col-md-12 mt-3">

                                        <label for="" class="mt-3">{{ $item->nama }}</label>
                                        <input type="hidden" name="formulir[{{ $index }}][id_rincian_formulir]"
                                            value="{{ $item->id_rincian_formulir }}">
                                        <input type="{{ $item->jenis }}" name="formulir[{{ $index }}][isi] }}"
                                            class="form-control" required>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                </div>
                <div class="col-md-6">


                    <h4 class="mt-3">Berkas yang dibutuhkan</h4>
                    <div class="row">

                        @foreach ($syaratBerkas as $index => $item)
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
                                <input type="hidden" name="id_syarat_berkas[{{ $index }}]"
                                    value="{{ $item->id_syarat_berkas }}">
                                <input type="file" name="file[{{ $index }}]" class="form-control" accept="application/pdf">
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
