@extends('layouts.admin.app')
@section('content')
   <div class="container-fluid p-5">
        <div class="card bg-light">
            <div class="card-body">
                <div class="">
                    <h3>Data {{ $title }}</h3>
                    
                    <a href={{ $create }} class="btn btn-success btn-sm mt-3"><i class="fa-solid fa-plus"></i> Tambah</a>
                    <div class="bg-white table-responsive m-3 p-3">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                                <th>No</th>
                                <th>Username</th>
                                <th>NIK</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@includeIf('admin.form.delete')
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
                    url: '{{ route('user.data') }}',
                },
                columns: [
                    {
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data:'nik'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
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
            function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Hapus Data');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
        }
        

    </script>
@endpush
