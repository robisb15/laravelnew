<div class="modal fade" id="modal-form-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form-edit">
    <div class="modal-dialog" role="document">
        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-3">

                        <label for="" class="mt-2">Jenis Berkas</label>
                        <select name="id_jenis_file" id="" ' class="form-control">
                                                                  @foreach ($jenisFile as $jenis)
                        <option value="{{ $jenis->id_jenis_file }}">{{ $jenis->nama }}</option>
                        @endforeach
                    </select>

                    <label for="" class="mt-3">Wajib</label>
                    <select name="wajib" id="status" class="form-control">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                
                </div>
            </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fa fa-arrow-circle-left"></i>&nbsp;Batal</button>
                    <button class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </form>
    </div>
</div>
