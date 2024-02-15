<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Layanan;

class HomeController extends Controller
{
    public function index(){
        $data['totalTotal'] = Pendaftaran::where('status', '!=', '1')->count();
        $data['totalProses'] = Pendaftaran::where('status', 3)->count();
        $data['totalSelesai'] = Pendaftaran::where('status', 4)->count();
        $data['totalTolak'] = Pendaftaran::where('status', 5)->count();
        $data['layanan']= Layanan::where('status',1)->get();
        return view('home',$data);
    }
}
