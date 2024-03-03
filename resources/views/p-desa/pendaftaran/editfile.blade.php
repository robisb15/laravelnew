<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="editModal-{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('pendaftaran.updateBerkas', [$pendaftaran->id_pendaftaran]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <input type="hidden" name="id_syarat_berkas" value="{{ $item->id_syarat_berkas }}">
                            
                            <h5 for="" class="mt-3">{{ $item->nama_jenis_file }} </h5>
                            <span>{{ $item->jenis_jenis_file }}</span>
                            @if ($item->syarat_wajib == 1)
                                <span class="badge text-bg-danger">Wajib</span>
                            @endif
                            @if ($item->berkas_jenis_file != null)
                                 <br>
                                Form:
                                <a href="{{ url('file/format?id=' . $item->berkas_jenis_file) }}"
                                    class="btn btn-sm btn-info ms-3 my-2">Download</a>
                                <br>
                            @endif
                            @if ($item->multiple_files == 1)
                                <input type="file" name="file[]" class="filepond"
                                    accept="application/pdf" multiple>
                               
                            @else
                                <input type="file" name="file[]" class="filepond"
                                    accept="application/pdf">
                            @endif
                    </div>

                </div>


                <button type="submit">Simpan</button>

                </form>
            </div>

        </div>
    </div>
</div>
