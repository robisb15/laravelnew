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
                <h3 class="mt-3">{{ $title }}</h3>
                <form action="{{ $route}}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">

                            @csrf
                            @method("PUT")
                            <div class="mt-3">

                                <label for="">Nama</label> 
                                <input type="text" name="nama" class="form-control" required value="{{ $user->nama }}">
                            </div>
                             <div class="mt-3">

                                <label for="">Username</label>
                                <input type="text" name="name" class="form-control" required value="{{$user->name }}">
                            </div>
                            <div class="mt-3">
                                
                                <label for="">Email</label> 
                                <input type="text" name="email" class="form-control" required value="{{ $user->email }}">
                            </div>
                             <div class="mt-3">

                                <label for="">Password</label> 
                                <input type="password" name="password" class="form-control" required >
                            </div>
                             <div class="mt-3">

                                <label for="">Konfirmasi Password</label> 
                                <input type="password" name="password_confirmation" class="form-control" required >
                            </div>
                            
                           
                        
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mt-3">

                                <label for="">NIP</label> 
                                <input type="text" name="nip" class="form-control" required value="{{ $user->nip }}">
                            </div>
                            
                            <div class="mt-3">

                                <label for="">No Hp</label> 
                                <input type="text" name="telepon" class="form-control" required value="{{ $user->telepon }}">
                            </div>
                           
                             <div class="mt-3">

                                <label for="">Alamat</label> 
                                <textarea name="alamat" class="form-control" required rows="4" >{{ $user->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-3 btn btn-sm btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
