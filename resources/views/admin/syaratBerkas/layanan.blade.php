@extends('layouts.admin.app')
@section('content')
    <div class="py-5 container-fluid">

        <div class="card bg-light">
            <div class="card-body">
                <div class="p-6 text-gray-900">
                    <div class="row">

                        <h3>Syarat Berkas {{ $layanan->nama_layanan }}</h3>
                    </div>

                    <br>
                    <a href={{ route('syarat-berkas.tambah', [$layanan->id_layanan]) }} class="btn btn-primary">Tambah</a>

                    <div class="bg-white table-responsive m-3 p-3">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Wajib</th>
                                <th>File</th>
                                <th width="15%">Urut</th>
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
@includeIf('admin.syaratBerkas.edit')
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
                    url: '{{ route('syarat-berkas.data', '') }}' + '/' + id,
                },
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                    },
                    {
                        data: 'status_layanan',
                        name: 'status_layanan',
                        render: function(data, type, full, meta) {
                            if (data.status == 1) {
                                status_layanan =
                                    '<span class="badge text-bg-success m-1">Aktif</span>';
                            } else {
                                status_layanan =
                                    '<span class="badge text-bg-danger m-1">NonAktif</span>';
                            }
                            return '<div>' + status_layanan +
                                '<form action="{{ route('syarat-berkas.status', '') }}/' +
                                data.id_syarat_berkas + '" method="post">' +
                                '@csrf' +
                                '@method('PUT')' +
                                '<button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-arrows-rotate"></i></button>' +
                                '</form>' +
                                '</div>'
                        }

                    },
                    {
                        data: 'wajib',
                        name: 'wajib',
                        render: function(data, type, full, meta) {
                            if (data == 1) {
                                return '<span class="badge text-bg-success m-1">Ya</span>';
                            } else {
                                return '<span class="badge text-bg-danger m-1">Tidak</span>';
                            }
                        }

                    },
                    {
                        data: 'file'
                    },
                    {
                        data: 'update_urut',
                        name: 'update_urut',
                        render: function(data, type, full, meta) {
                            return '<form action="' + '{{ url('admin/syarat-berkas/urut/') }}/' +
                                data[
                                    'id_syarat_berkas'] + '" method="post">' +
                                '{{ csrf_field() }}' +
                                '{{ method_field('PUT') }}' +

                                '<div class="row">' +
                                '<div class="col-md-7">' +
                                '<input type="number" min="1" value="' + data['urut'] +
                                '" class="form-control" name="urut" >' +
                                '</div>' +
                                '<div class="col-md-5">' +
                                '<button type="submit" class="btn btn-sm btn-primary p-2 mt-1">' +
                                '<i class="fa fa-check"></i></button>' +
                                '</div>' +
                                '</div>' +
                                '</form>';
                        },
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',

                    },
                ],
                columnDefs: [{
                    className: 'text-center',
                    targets: [0, 1, 2, 3, 5]
                }, ]
            });
        });

        function deleteForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Hapus Data');
            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
        }

        function editForm(url, id) {
            $('#modal-form-edit').modal('show');
            $('#modal-form-edit .modal-title').text('Edit Syarat Berkas');

            // Fix the function name from JSON_parse to JSON.parse

            $('#modal-form-edit form')[0].reset();
            $('#modal-form-edit form').attr('action', url);
            $('#modal-form-edit [name=_method]').val('put');

            // Use .val() to set the value of the input field
            $('#modal-form-edit [name=id_jenis_file]').attr('value', id);
        }

        function lihatFile(id, nama) {
            var namaFile = nama.replace('.pdf', '');
            var storageUrl = '{{ url('/files/view/') }}/' + id + '/' + namaFile;
            $('#modal-file').modal('show');
            $('#modal-file .modal-title').text('Preview File');
            // Mengatur sumber iframe dengan URL dari Storage
            $('#pdf').attr('src', storageUrl);
        }




        function unescapeHTML(escapedHTML) {
            return escapedHTML.replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&').replace(/&quot;/g, '"')
                .replace(/&quot;/g, '"');
        }
    </script>
@endpush
