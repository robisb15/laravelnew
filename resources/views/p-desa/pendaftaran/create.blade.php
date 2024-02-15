@extends('layouts.p-desa.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Layanan</h2>
            <div class="row gap-3 m-4">

                @foreach ($layanan as $item)
                    <div class="col-5">
                        <a href="{{ route('pendaftaran.layanan',[$item->id_layanan]) }}" class="btn btn-info w-100 m-3">
                            <div class="col-12  rounded p-3 pt-4 pb-4 m-2">
                               <h5> {{ $item->nama_layanan }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
