@extends('layouts.admin.app')
@section('content')
    <div class="container p-4">
        <div class="card bg-light">
            <div class="card-body">
                <div class="row">
                    <div class="">

                        <h4 class="mt-3">Pendaftaran</h4>
                        <div class="table-responsive">

                            <table class="table table-responsive mt-5">
                                <thead>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Kode Pendaftaran</th>
                                    <th>Nama Layanan</th>

                                    <th>Tanggal Pengajuan</th>
                                    <th>Admin</th>
                                    <th>Status</th>

                                    <th>aksi</th>
                                </thead>
                            </table>
                        </div>
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
                    url: '{{ route('pengajuan.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_user'
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
                        data: 'nama_admin'
                    },
                    {
                        data: 'nama_status',
                    },
                    {
                        data: 'aksi',
                    },
                ],
                columnDefs: [{
                    className: 'text-center',
                    targets: [0, 1, 2]
                }, ]
            });
        });
    </script>
@endpush
