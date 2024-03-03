@extends('layouts.auth')
@section('content')
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                         <img src="{{ asset('img') }}/tebo.ico" width="10%" height="10%" >
                        <a href="index.html" class="ms-2">
                            <h3 class="text-primary">AYUNDA</h3>
                        </a>
                       
                    </div>

                    <h4>Selamat Datang !!</h4>
                    <p>Di Aplikasi Pelayanan Kependudukan di Desa</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput"
                                name="nik" value="{{ old('nik') }}" required autofocus
                                autocomplete="nik">

                            <label for="floatingInput">NIK</label>
                            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" required autocomplete="current-password"
                                id="floatingPassword" placeholder="Password" name="password" >
                            <label for="floatingPassword">Password</label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-25 mb-4">Login</button>
                      
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
@endsection
{{-- 
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


</x-guest-layout> --}}
