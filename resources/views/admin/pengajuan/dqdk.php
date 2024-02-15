<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
              
                   <form action="{{ route('pengajuan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_pendaftaran" value="{{ $id_pendaftaran }}">
                    <label for="">Perbarui Status</label>
                    <select name="status" id="">
                        <option value="3">Proses</option>
                        <option value="5">Tolak</option>
                    </select>
                    <br>
                    <label for="">Keterangan</label>
                    <input type="text" name="keterangan" id="">
                    <button type="submit">Perbarui</button>
                   </form>
               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
