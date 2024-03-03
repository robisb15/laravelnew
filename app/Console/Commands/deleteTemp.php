<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\Models\{
    Temp,
    Berkas
};
use Carbon\Carbon;
use Str;
use Illuminate\Support\Facades\Storage;

class deleteTemp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-temp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete file temp';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Ambil waktu sekarang
        $waktuSekarang = Carbon::now();

        // Subtraksikan 24 jam dari waktu sekarang
        $waktuSebelumnya = $waktuSekarang->subHours(24);

        // Ambil data dari database yang lebih dari 24 jam
        $temp = Temp::where('created_at', '<', $waktuSebelumnya)
            ->get();

        if (count($temp) > 0) {
            foreach($temp as $file){

                Storage::delete('files/temp/' . $file->folder . '/' . $file->file);
    
                // Hapus direktori jika kosong
                if (count(Storage::files('files/temp/' . $file->folder)) === 0) {
                    Storage::deleteDirectory('files/temp/' . $file->folder);
                }
                $id = $file->id_tmp;
                // Hapus entri dari database
                $file->delete();
                Log::info('File Temp Berhasil dihapus', [
            'temp' => $id,
            'status' => 'Berhasil',
            'message' => 'File Temp Berhasil dihapus',
                ]);
            }
            // Hapus file dari penyimpanan
        } else {
            Log::info('File Temp Kosong', [
                'message' => 'File Temp Kosong',
            ]);
        }
    }
}
