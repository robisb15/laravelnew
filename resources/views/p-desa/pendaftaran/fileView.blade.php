<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal-{{ $berkas->id_berkas_upload }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        @php
                            $file = $berkas->nama_file;
                            $nama_file = str_replace('.pdf', '', $file);
                        @endphp
                        <iframe id="pdf"
                            src ="{{ url('/files/download/' . $nama_file . '?id_berkas=' . $berkas->id_berkas) }}"
                            width="100%" height="450px"></iframe>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
