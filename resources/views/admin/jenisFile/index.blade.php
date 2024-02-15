@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid p-5">
        <div class="card bg-light">
            <div class="card-body">
                <div class="">
                    <h3>Jenis File</h3>
        

                    <a href={{ url('/admin/jenis-file/create') }} class="btn btn-primary mt-3">Tambah</a>
                    <div class="bg-white table-responsive m-3 p-3">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>File</th>
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
@includeIf('admin.jenisFile.edit')
@includeIf('admin.form.file')
@push('scripts')
    <script>
        let table;
        var url = new URL(window.location.href);

        // Mengambil path name dari URL
        var segments = url.pathname.split('/');

        // Mengambil ID dari segmen terakhir
        var id = segments[segments.length - 1];

        // Contoh penggunaan:
        console.log("ID dari URL:", id);
        $(function() {
            table = $('.table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('jenis-file.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',

                    },
                    {
                        data:'keterangan',
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, full, meta) {
                            if (data == 1) {
                                return 'Aktif';
                            } else {
                                return 'NonAktif';
                            }
                        }

                    },
                    {
                        data:'file',
                        name:'file'
                    },
                   
                    {
                        data: 'aksi',
                        name: 'aksi',
                        render: function(data, type, full, meta) {
                            var status = '';

                            if (data.status == 1) {
                                status = '<li>' +
                                    '<form action="{{ route('jenis-file.status', '') }}/' +
                                    data.id_jenis_file + '" method="post">' +
                                    '@csrf' +
                                    '@method('PUT')' +
                                    '<input type="hidden" name="status" value="0">' +
                                    '<button type="submit" class="dropdown-item">NonAktif</button>' +
                                    '</form>' +
                                    '</li>';
                            } else {
                                status = '<li>' +
                                    '<form action="{{ url('admin/jenis-file/status/') }}/' +
                                    data.id_jenis_file + '" method="post">' +
                                    '@csrf' +
                                    '@method('PUT')' +
                                    '<input type="hidden" name="status" value="1">' +
                                    '<button type="submit" class="dropdown-item">Aktif</button>' +
                                    '</form>' +
                                    '</li>';
                            }

                            return '<div class="dropdown">' +
                                '<button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">' +
                                'Aksi' +
                                '</button>' +
                                '<ul class="dropdown-menu">' +
                                '<li>' + unescapeHTML(data.edit) + '</li>' +
                                '<li>' + unescapeHTML(data.delete) + '</li>' +
                                '<li>' + unescapeHTML(status) + '</li>' +
                                '</ul>' +
                                '</div>' +
                                '</li>';
                        }

                    },
                ],
                columnDefs: [{
                    className: 'text-center',
                    targets: [0, 3, 5]
                }, ]
            });
        });

        function deleteForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Hapus Data');
            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
        }

        function editForm(url, nama, keterangan) {
            $('#modal-form-edit').modal('show');
            $('#modal-form-edit .modal-title').text('Edit layanan');

            // Fix the function name from JSON_parse to JSON.parse

            $('#modal-form-edit form')[0].reset();
            $('#modal-form-edit form').attr('action', url);
            $('#modal-form-edit [name=_method]').val('put');
             $('#modal-form-edit [name=nama]').attr('value', nama);
              $('#modal-form-edit [name=keterangan]').attr('value', );

        }
        function lihatFile(id) {
            $('#modal-file').modal('show');
            $('#modal-file .modal-title').text('Preview File');

            // Mendefinisikan URL untuk mendapatkan response dari Storage
            var storageUrl = '{{ route("storage.view", "") }}/' + id;

            // Mengatur sumber iframe dengan URL dari Storage
            $('#pdf').attr('src', storageUrl);
        }
        function unescapeHTML(escapedHTML) {
            return escapedHTML.replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&').replace(/&quot;/g, '"')
                .replace(/&quot;/g, '"');
        }
    </script>
@endpush
