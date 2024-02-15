<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method("delete")
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Anda yakin ingin menghapus data ini ?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-arrow-circle-left"></i>&nbsp;Batal</button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
