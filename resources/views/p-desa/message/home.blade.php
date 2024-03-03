@extends('layouts.p-desa.app')

@section('content')
<div class="container m-3">
    @livewire('message', ['users' => $users, 'messages' => $messages ?? null])
</div>
@endsection
