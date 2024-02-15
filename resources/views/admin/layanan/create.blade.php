@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid my-4">
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
                    <div class="col-md-8 col-xl-8 col-sm-12 offset-md-2 offset-md-2">
                        <h3>Tambah Layanan</h3>

                        <form action="{{ url('admin/layanan') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="mt-3">Nama Layanan</label><span> (wajib)</span>
                            <input type="text" name="nama_layanan" class="form-control " required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                     <label for=""class="mt-3">keterangan</label><span> (wajib)</span>
                            <input type="text" name="keterangan" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                      <label for=""class="mt-3">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                                </div>
                                <div class="col-md-6">
                                    <label for=""class="mt-3">Urut</label><span> (wajib)</span>
                           <input type="number" name="urut" class="form-control" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
