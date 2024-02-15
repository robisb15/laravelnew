<div class="modal fade" id="modal-form-edit" tabindex="-1" role="dialog" aria-labelledby="modal-form-edit">
    <div class="modal-dialog" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="" class="mt-3">Nama Layanan</label>
                    <input type="text" class="form-control" name="nama_layanan" id="nama_layanan" >
                    
                    <label for="" class="mt-3">keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control">
                
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
