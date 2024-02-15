@extends('layouts.admin.app')
@section('content')
    <div class="py-5 container-fluid">

        <div class="card bg-light">
            <div class="card-body">
                <div class="p-6 text-gray-900">
                    <div class="row">

                        <h3>Layanan {{ $layanan->nama_layanan }}</h3>
                    </div>

                    <br>
                    <a href={{ route('rincian-formulir.tambah', [$layanan->id_layanan]) }} class="btn btn-primary">Tambah
                        Formulir</a>

                     <div class="bg-white table-responsive m-3 p-3">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th width="20%">Isi</th>
                                <th>Tag</th>
                                <th>Status</th>
                                <th  width="20%">Urut</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@includeIf('admin.form.delete')
@includeIf('admin.rincianFormulir.edit')
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
                    url: '{{ url('/admin/rincian-formulir/data/') }}' + '/' + id,
                },
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',

                    },
                    {
                        data: 'jenis',
                        name: 'jenis',
                        render: function(data, type, full, meta) {
                            if (data == 'option') {
                                return 'Pilihan';
                            } else if (data == 'date') {
                                return 'Tanggal';
                            } else if (data == 'text') {
                                return 'Teks';
                            } else if (data == 'number') {
                                return 'Angka';
                            }
                            else if (data == 'textarea') {
                                return 'Teks Area';
                            }
                        }

                    },
                    {
                        data: 'isi_form',
                        name: 'isi_form',
                        render: function(data, type, full, meta) {
                            if (data.jenis == 'option') {
                                isi = JSON.parse(unescapeHTML(data.isi));

                                newIsi = '';
                                for (i = 0; i < isi.length; i++) {
                                    if (i == 0) {
                                        newIsi += isi[i].name;
                                    } else {
                                        newIsi += ',' + isi[i].name;
                                    }
                                }
                                return newIsi;
                            }
                            return '-';
                        }
                    },
                    {
                        data: 'tag'
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
                        data: 'update_urut',
                        name: 'update_urut',
                        render: function(data, type, full, meta) {
                            return '<form action="' + '{{ url('admin/rincian-formulir/urut/') }}/' +
                                data[
                                    'id_rincian_formulir'] + '" method="post">' +
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
                        render: function(data, type, full, meta) {
                            var status = '';

                            if (data.status == 1) {
                                status = '<li>' +
                                    '<form action="{{ route('rincian-formulir.status', '') }}/' +
                                    data.id_rincian_formulir + '" method="post">' +
                                    '@csrf' +
                                    '@method('PUT')' +
                                    '<input type="hidden" name="status" value="0">' +
                                    '<button type="submit" class="dropdown-item">NonAktif</button>' +
                                    '</form>' +
                                    '</li>';
                            } else {
                                status = '<li>' +
                                    '<form action="{{ url('admin/rincian-formulir/status/') }}/' +
                                    data.id_rincian_formulir + '" method="post">' +
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

        function editForm(url, nama, jenis,tag) {
            $('#modal-form-edit').modal('show');
            $('#modal-form-edit .modal-title').text('Edit layanan');

            // Fix the function name from JSON_parse to JSON.parse

            $('#modal-form-edit form')[0].reset();
            $('#modal-form-edit form').attr('action', url);
            $('#modal-form-edit [name=_method]').val('put');

            // Use .val() to set the value of the input field
            $('#modal-form-edit [name=jenis]').attr('value', jenis);
             $('#modal-form-edit [name=nama]').attr('value', nama);
              $('#modal-form-edit [name=tag]').attr('value', tag);

        }

        function unescapeHTML(escapedHTML) {
            return escapedHTML.replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&').replace(/&quot;/g, '"')
                .replace(/&quot;/g, '"');
        }
    </script>
@endpush
