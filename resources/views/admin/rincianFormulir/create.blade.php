@extends('layouts.admin.app')
@section('content')
    <div class="container p-4">
        <div class="card bg-light">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Lengkapi Data Berdasarkan Pesan Error dibawah ini.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <h4>Tambah Formulir</h4>
                        <br>
                        <form action="{{ route('rincian-formulir.store') }}" method="POST">
                            @csrf
                            <h5 class="mt-3">Layanan {{ $layanan->nama_layanan }}</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="" class="mt-3">Jenis Input</label>
                                        <select name="jenis" id="" class="form-control">
                                            <option value="number">Number</option>
                                            <option value="option">Pilihan</option>
                                            <option value="date">Tanggal</option>
                                            <option value="text">Teks</option>
                                            <option value="textarea">Teks Area</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="" class="mt-3">Status</label>
                                        <select name="status" id="status"class="form-control">
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="nama" class="mt-2">Nama</label>
                                        <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="tag" class="mt-3">Tag</label>
                                        <input type="text" name="tag" class="form-control" required value="{{ old('tag') }}">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="isi" class="mt-3">Isi (untuk Pilihan)</label>
                                        <input type="text" name="isi" class="form-control" value="{{ old('isi') }}">
                                        <span style="font-size: 9pt; color:red">Gunakan koma untuk pemisah nilai contoh: ayah,ibu,anak</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="" class="mt-3">Urut</label>
                                        <input type="number" name="urut" class="form-control" required value="{{ old('urut') }}">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_layanan" id="" value="{{ $layanan->id_layanan }}">
                            <button type="submit" class="mt-2 btn btn-sm btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
