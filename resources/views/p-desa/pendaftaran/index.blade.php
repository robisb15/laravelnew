@extends('layouts.p-desa.app')
@section('content')
    <div class="card">
        <div class="card-body bg-light">
            <div class="row">
                <div class="col-md-12">
                   <h4>Pengajuan</h4>
            
                <a href={{ route('pendaftaran.create')}} class="btn btn-primary">Ajukan Pendaftaran</a>
            
                <div class="bg-white table-responsive m-3 p-3">
                        <table class="table table-responsive table-bordered table-hover">
                        <thead>
                        <th>No</th>
                        <th>Kode Pendaftaran</th>
                        
                        <th>Nama Layanan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                </table>
            </div>
        </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
 <script>
        let table;

        $(function() {
            table = $('.table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('pendaftaran.data') }}',
                },
                columns: [
                    {
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'kode_pendaftaran'
                    },
                    {
                        data: 'nama_layanan'
                    },
                    {
                        data: 'tanggal_pengajuan'
                    },
                    {
                        data: 'nama_status'
                    },
                    {
                        data: 'aksi',
                    },
                ],
                columnDefs: [
                    {
                        className: 'text-center',
                        targets: [0, 1,2]
                    },
                ]
            });
        });
        

    </script>
@endpush

