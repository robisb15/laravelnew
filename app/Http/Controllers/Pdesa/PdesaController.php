<?php

namespace App\Http\Controllers\Pdesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Pendaftaran;
use DB;

class PdesaController extends Controller
{
    public function dashboard()
    {

        $data['layanan'] = Layanan::where('status', 1)->orderBy('urut')->get();
        $data['totalTotal'] = Pendaftaran::where('status', '!=', '1')->count();
        $data['totalProses'] = Pendaftaran::where('status', 3)->count();
        $data['totalSelesai'] = Pendaftaran::where('status', 4)->count();
        $data['totalTolak'] = Pendaftaran::where('status', 5)->count();
        return view('p-desa.dashboard', $data);

    }
    public function show($id)
    {
        $data['user'] = DB::table('users')
            ->join('profil', 'profil.id_user', 'users.id')
            ->where('users.id', $id)
            ->select('users.*', 'profil.*')
            ->first();
        return view('p-desa.profil', $data);
    }
}
