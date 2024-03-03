@extends('layouts.admin.app')
@section('content')
    <div class="py-5 container-fluid">

        <div class="card bg-light">
            <div class="card-body">
                <div class="p-6 text-gray-900">
                    <div class="row">

                        <h3 id="judul">Layanan</h3>
                    </div>


                    <a href={{ route('layanan.create') }} class="btn btn-success btn-sm mt-3"><i class="fa-solid fa-plus"></i> Tambah</a>

                    <div class="bg-white table-responsive m-3 p-3">
                        <table class="table table-responsive table-bordered table-hover">
                            <thead>
                                <th>No</th>
                                <th >Nama Layanan</th>
                                <th >Keterangan</th>
                                <th>Status</th>
                                <th width='20%'>Kode</th>
                                <th width='20%'>Urut</th>
                                <th width='10%'>Aksi</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@includeIf('admin.form.delete')
@includeIf('admin.layanan.edit')
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
                    url: '{{ route('layanan.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_layanan',

                    },
                    {
                        data: 'keterangan'
                    },
                    {
                        data: 'status_layanan',
                        name: 'status_layanan',
                        render: function(data, type, full, meta) {
                            if (data.status == 1) {
                                status_layanan = '<span class="badge text-bg-success m-1">Aktif</span>';
                            } else {
                                status_layanan =  '<span class="badge text-bg-danger m-1">NonAktif</span>';
                            }
                            return '<div>' + status_layanan +
                                '<form action="{{ route('layanan.status', '') }}/' +
                                data.id_layanan + '" method="post">' +
                                '@csrf' +
                                '@method('PUT')' +
                                '<button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-arrows-rotate"></i></button>' +
                                '</form>' +
                                '</div>'
                        }

                    },
                    {
                        data: 'update_kode',
                        name: 'update_kode',
                        render: function(data, type, full, meta) {
                            return '<form action="' + '{{ url('admin/layanan/kode/') }}/' + data[
                                    'id_layanan'] + '" method="post">' +
                                '{{ csrf_field() }}' +
                                '{{ method_field('PUT') }}' +

                                '<div class="row">' +
                                '<div class="col-md-7">' +
                                '<input type="text" required value="' + data['kode'] +
                                '" class="form-control" name="kode" >' +
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
                        data: 'update_urut',
                        name: 'update_urut',
                        render: function(data, type, full, meta) {
                            return '<form action="' + '{{ url('admin/layanan/urut/') }}/' + data[
                                    'id_layanan'] + '" method="post">' +
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

        function editForm(url, data1, data2) {
            $('#modal-form-edit').modal('show');
            $('#modal-form-edit .modal-title').text('Edit layanan');

            // Fix the function name from JSON_parse to JSON.parse

            $('#modal-form-edit form')[0].reset();
            $('#modal-form-edit form').attr('action', url);
            $('#modal-form-edit [name=_method]').val('put');

            // Use .val() to set the value of the input field
            $('#modal-form-edit [name=nama_layanan]').attr('value', data1);
            $('#modal-form-edit [name=keterangan]').attr('value', data2);
        }

        function unescapeHTML(escapedHTML) {
            return escapedHTML.replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&').replace(/&quot;/g, '"')
                .replace(/&quot;/g, '"');
        }
    </script>
@endpush
