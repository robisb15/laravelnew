<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal-edit" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Perbarui Status Pengajuan
                        </h1>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pengajuan.update',[$pendaftaran->id_pendaftaran]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="" class="mt-3 ">Keterangan</label>
                            <input type="text" name="keterangan" id="" class="form-control">

                            <label for="" class="mt-3 ">File</label>
                            <input type="file" name="file" id="" class="form-control" accepts="application/pdf">
                            <button type="submit" class="btn btn-sm btn-primary m-3">Perbarui</button>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                      @php
                            $file = $pendaftaran->nama_file;
                            $nama_file = str_replace('.pdf', '', $file);
                        @endphp
                        <iframe id="pdf"
                            src ="{{ url('/files/download/' . $nama_file . '?id_berkas=' . $pendaftaran->id_berkas) }}"
                            width="100%" height="450px"></iframe> 
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
