@extends('layouts.p-desa.app')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    Edit {{ $pendaftaran->kode_pendaftaran }}
                    <br>
                    <form action="{{ route('pendaftaran.update', [$pendaftaran->id_pendaftaran]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id_layanan" value="{{ $pendaftaran->id_layanan }}">
                        @foreach ($isiFormulir as $index => $item)
                            @if ($item->jenis == 'option')
                                <label for="">{{ $item->nama }}</label>
                                <input type="hidden" name="formulir[{{ $index }}][id_isi_formulir]"
                                    value="{{ $item->id_isi_formulir }}" >
                                <select name="formulir[{{ $index }}][isi]" id=""class="form-control">
                                    @foreach ($i = json_decode($item->isi) as $i)
                                        @if ($i->value == explode('.', $item->isi_formulir)[0])
                                            <option value="{{ $i->value . '.' . $i->name }}" selected>{{ $i->name }}
                                            </option>
                                        @else
                                            <option value="{{ $i->value . '.' . $i->name }}">{{ $i->name }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <br>
                                 @elseif($item->jenis == 'textarea')
                                    <div class="col-md-8 mt-3">
                                        <input type="hidden" name="formulir[{{ $index }}][id_isi_formulir]"
                                            value="{{ $item->id_isi_formulir }}">
                                        <label for="">{{ $item->nama }}</label>
                                        <textarea name="formulir[{{ $index }}][isi] }}" class="form-control"  rows="4">{{ $item->isi_formulir }}</textarea>

                                    </div>
                                     @elseif($item->jenis == 'date'||$item->jenis == 'number')
                                     <div class="col-md-4 mt-3">

                                        <label for="" class="mt-3">{{ $item->nama }}</label>
                                        <input type="hidden" name="formulir[{{ $index }}][id_isi_formulir]"
                                            value="{{ $item->id_isi_formulir }}">
                                        <input type="{{ $item->jenis }}" name="formulir[{{ $index }}][isi] }}"
                                            class="form-control" required value="{{ $item->isi_formulir }}">
                                    </div>
                            @else
                                <label for="">{{ $item->nama }}</label>
                                <input type="hidden" name="formulir[{{ $index }}][id_isi_formulir]"
                                    value="{{ $item->id_isi_formulir }}" class="form-control">
                                <input type="{{ $item->jenis }}" name="formulir[{{ $index }}][isi] }}"
                                    value="{{ $item->isi_formulir }}" class="form-control">

                                <br>
                            @endif
                        @endforeach
                          <input type="submit" name="draft" value="Draft" class="btn btn-info">
                       <input type="submit" name="kirim" value="Kirim" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
