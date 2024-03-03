<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal-{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if($pendaftaran->status !== '3' && $pendaftaran->status !== '4' )
                  
                    <div class="col-md-12">
                        <form action="{{ route('pengajuan.konfirmasi-berkas') }}" method="post">
                            @csrf
                        <input type="hidden" name="id_berkas_upload" value="{{ $item->id_berkas_upload }}">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">

                                <label class="btn btn-success m-1">
                                  <input type="radio" name="status" id="option1" checked value="2"> Terima
                                </label>
                                <label class="btn btn-danger">
                                  <input type="radio" name="status" id="option2" value="3"> Tolak
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <textarea name="keterangan" id="keterangan" rows="1" placeholder="Keterangan" class="form-control"></textarea>

                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6 offset-md-3">
                               <button type="submit" class="btn btn-primary">Perbarui</button>

                            </div>
                        </div>
                        </form>
                    </div>
                    @endif
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        @php
                            $file = $item->nama_file;
                            $nama_file = str_replace('.pdf', '', $file);
                        @endphp
                        <iframe id="pdf"
                            src ="{{ url('/files/download/' . $nama_file . '?id_berkas=' . $item->id_berkas) }}"
                            width="100%" height="450px"></iframe> 
                     
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
