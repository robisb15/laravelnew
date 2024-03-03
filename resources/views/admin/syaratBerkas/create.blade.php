@extends('layouts.admin.app')
@section('content')
    <div class="container p-5">
        <div class="card bg-light p-4">
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
                   <h4> Tambah Syarat Berkas</h4>
                  <div class="col-md-8 offset-md-2">

                      <form action="{{route('syarat-berkas.store')}}" method="POST" >
                        @csrf
                        <h5 for="" class="mt-3">Layanan {{ $layanan->nama_layanan }}</h5>
                        <input type="hidden" value="{{ $layanan->id_layanan }}" name="id_layanan">
                        
                        <label for="" class="mt-3">Jenis Berkas</label>
                        <select name="id_jenis_file" id="" class="form-control" required>
                            @foreach ($jenisFile as $item)
                            <option value="{{ $item->id_jenis_file }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        
                        
                        <label for="" class="mt-2">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        
                        <label for="" class="mt-2">Urut</label>
                        <input type="number" name="urut" class="form-control" required>
                        
                        <label for="" class="mt-2">Wajib</label>
                        <select name="wajib" id="status" class="form-control" required>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
