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

                                <label for="">Nama </label><span
                                        class="badge text-bg-danger mb-1 ms-1">Wajib</span>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="mt-3">
                                <label for="">Keterangan </label><span
                                        class="badge text-bg-danger mb-1 ms-1">Wajib</span>
                              
                                <textarea name="keterangan" id="" rows="3" class="form-control"></textarea>

                            </div>
        
                            <div class="mt-3">

                                <label for="">File</label>
                                <input type="file" name="file" class="form-control" accept="application/pdf">
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
