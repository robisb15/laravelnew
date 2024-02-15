@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid p-5">
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

                        <h3 class="mt-3">Tambah Jenis File</h3>
                        <br>
                        <form action="{{ route('jenis-file.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">

                                <label for="">Nama</label> <span>(wajib)</span>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="mt-3">
                                <label for="">Keterangan</label><span>(wajib)</span>
                                <input type="text" name="keterangan" class="form-control" required>

                            </div>
                            <div class="mt-3">

                                <label for="">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="mt-3">

                                <label for="">File</label>
                                <input type="file" name="file" class="form-control" accept="application/pdf">
                            </div>
                            <button type="submit" class="mt-3 btn btn-sm btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
