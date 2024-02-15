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
                            <h3 class="text-primary">DUKCAPIL TEBO</h3>
                        </a>
                       
                    </div>

                    <h3 class="mt-5">Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput"
                                name="email"placeholder="name@example.com" :value="old('email')" required autofocus
                                autocomplete="email">

                            <label for="floatingInput">Email</label>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" required autocomplete="current-password"
                                id="floatingPassword" placeholder="Password" name="password" :value="__('Password')">
                            <label for="floatingPassword">Password</label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Login</button>
                      
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
