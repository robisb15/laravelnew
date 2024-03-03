@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid p-5">
        <div class="card bg-light">
            <div class="card-body d-flex justify-content-center align-items-center">
                <div>
                    <h5>Biodata {{ $title }}</h5>
                    <img class="rounded-circle" src="{{ asset('SqvNR7QrAdmin') }}/img/logoUser.png" alt=""
                        style="width: 20%; height: 20%">

                    <table class="table table-borderless">
                        <tr>
                            <td width="15%">Nama</td>
                            <td>: {{ $user->nama }}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>: {{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>: {{ $user->nik }}</td>
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
@endsection
