
<div class="modal fade" id="kirimModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Kirim Pengajuan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          Apa anda yakin ingin mengirim pengajuan?
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary btn-sm"data-bs-dismiss="modal">Batal</button>
         <a href="{{ route('kirim.pendaftaran',$pendaftaran->id_pendaftaran) }}" class="btn btn-sm btn-primary">Kirim</a>
      </div>
    </div>
  </div>
</div>