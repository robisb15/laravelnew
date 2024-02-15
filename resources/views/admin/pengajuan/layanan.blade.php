<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Daftar Layanan {{ $layanan->nama_layanan }}
                    <br>
                    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_layanan" value="{{ $layanan->id_layanan }}">
                        @foreach ($rincianFormulir as $index => $item)
                            @if ($item->jenis == 'option')
                                <label for="">{{ $item->nama }}</label>
                                <input type="hidden" name="formulir[{{ $index }}][id_rincian_formulir]"
                                    value="{{ $item->id_rincian_formulir }}">
                                <select name="formulir[{{ $index }}][isi]" id="">
                                    @foreach ($i = json_decode($item->isi) as $item)
                                        <option value="{{ $item->value .'.'. $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                <br>
                            @else
                                <label for="">{{ $item->nama }}</label>
                                <input type="hidden" name="formulir[{{ $index }}][id_rincian_formulir]"
                                    value="{{ $item->id_rincian_formulir }}">
                                <input type="{{ $item->jenis }}" name="formulir[{{ $index }}][isi] }}">

                                <br>
                            @endif
                        @endforeach

                        <h4>Berkas yang dibutuhkan</h4>
                        <br>
                        <br>
                        @foreach ($syaratBerkas as $index => $item)
                            <label for="">{{ $item->nama_file }} <br>{{ $item->keterangan_file }}</label>

                            @if ($item->wajib == 1)
                                <span>Wajib</span>
                            @endif
                            <input type="hidden" name="id_syarat_berkas[{{ $index }}]"
                                value="{{ $item->id_syarat_berkas }}">
                            <input type="file" name="file[{{ $index }}]">
                            <br>
                            <br>
                        @endforeach

                        <br>
                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
