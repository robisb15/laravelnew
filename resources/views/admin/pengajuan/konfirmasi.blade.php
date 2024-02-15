
<div class="modal fade" id="exampleModal-konfirmasi" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('pengajuan.store') }}" method="POST">
                        @csrf

                        <div class="modal-content">
                             <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                            <div class="modal-body">
                                <div class="mt-3">

                                    <input type="hidden" name="id_pendaftaran" value="{{ $pendaftaran->id_pendaftaran }}">
                                    <label for="">Perbarui Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="3">Proses</option>
                                        <option value="5">Tolak</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="">Keterangan</label><span>(wajib)</span>
                                    <input type="text" name="keterangan" class="form-control" required>

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