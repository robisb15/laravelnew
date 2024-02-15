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
                    <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="" class="mt-3">Jenis Input</label>
                                        <select name="jenis" id="" class="form-control">
                                            <option value="number">Number</option>
                                            <option value="option">Pilihan</option>
                                            <option value="date">Tanggal</option>
                                            <option value="text">Teks</option>
                                            <option value="textarea">Teks Area</option>
                                        </select>
                                    </div>
                                </div>
                              
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="nama" class="mt-2">Nama</label>
                                        <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="tag" class="mt-3">Tag</label>
                                        <input type="text" name="tag" class="form-control" required value="{{ old('tag') }}">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="isi" class="mt-3">Isi (untuk Pilihan)</label>
                                        <input type="text" name="isi" class="form-control" value="{{ old('isi') }}">
                                        <span style="font-size: 9pt; color:red">Gunakan koma untuk pemisah nilai contoh: ayah,ibu,anak</span>
                                    </div>
                                </div>
        
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
