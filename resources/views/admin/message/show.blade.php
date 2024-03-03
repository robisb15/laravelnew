@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid m-3">
        <div class="container">
            @livewire('show', ['users' => $users, 'messages' => $messages, 'sender' => $sender])
        </div>
    </div>
@endsection
