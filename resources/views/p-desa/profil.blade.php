@extends('layouts.p-desa.app')
@section('content')
    <div class="container-fluid p-5">
        <div class="card bg-light">
            <div class="card-body">
                <div class="">
                    <h5>Pegawai Desa</h5>

                    <table class="table">
                        <tr>
                            <td width="15%">Nama</td>
                            <td>: {{ $user->nama }}</td>
                        </tr>
                         <tr>
                            <td>Username</td>
                            <td>: {{ $user->name }}</td>
                        </tr>
                         <tr>
                            <td>NIP</td>
                            <td>: {{ $user->nip }}</td>
                        </tr>
                         <tr>
                            <td>Alamat</td>
                            <td>: {{ $user->alamat }}</td>

                        </tr>
                         <tr>
                            <td>Email</td>
                            <td>: {{ $user->email }}</td>
                        </tr>
                         <tr>
                            <td>No Hp</td>
                            <td>: {{ $user->telepon }}</td>
                        </tr>
                    </table>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
