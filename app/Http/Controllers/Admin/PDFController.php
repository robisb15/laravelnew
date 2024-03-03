<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pendaftaran;
use App\Models\Layanan;
use App\Models\Status;
use Carbon\Carbon;
use App\Helpers\BulanHelper;
use Alert;

class PDFController extends Controller
{
    public function index(){
        $data['layanans']= Layanan::orderBy('nama_layanan')->get();
        $data['status']= Status::where('id','<>',1)->get();
        return view('admin.pdf.index',$data);
    }
    public function generatePDF(Request $request)
    {
        if ($request->input == 'tanggal') {
            if (!$request->daterange) {
                Alert::error('Gagal', 'Periode Kosong');
                return back();
            }

            $dateRangeArray = explode(' - ', $request->daterange);
            $tanggalAwal = Carbon::createFromFormat('d/m/Y', $dateRangeArray[0])->startOfDay();
            $tanggalAkhir = Carbon::createFromFormat('d/m/Y', $dateRangeArray[1])->endOfDay();

            $query = Pendaftaran::join('profil as user_profile', 'user_profile.id_user', '=', 'pendaftarans.user_id')
                ->leftJoin('profil as admin_profile', 'admin_profile.id_user', '=', 'pendaftarans.admin_id')
                ->join('layanan', 'layanan.id_layanan', '=', 'pendaftarans.id_layanan')
                ->join('status', 'status.id', '=', 'pendaftarans.status')
                ->whereBetween('pendaftarans.created_at', [$tanggalAwal, $tanggalAkhir]);

            if ($request->id_layanan != 'all') {
                $query->where('pendaftarans.id_layanan', $request->id_layanan);
            }

            if ($request->id_status != 'all') {
                $query->where('pendaftarans.status', $request->id_status);
            } else {
                $query->where('pendaftarans.status', '!=', '1');
            }

            $pendaftaran = $query->select(
                'pendaftarans.*',
                'user_profile.nama as nama_user',
                'status.nama as nama_status',
                'layanan.nama_layanan',
                'admin_profile.nama as nama_admin'
            )
                ->get();

            $title = 'Rentang Tanggal ' . $dateRangeArray[0] . ' s/d ' . $dateRangeArray[1];
        } elseif ($request->input == 'bulan') {
            if (!$request->month) {
                Alert::error('Gagal', 'Periode Kosong');
                return back();
            }

            $bulanTahun = $request->month;
            $monthYear = explode('-', $bulanTahun);
            $tanggalAwal = Carbon::createFromFormat('Y-m', $bulanTahun)->startOfMonth();
            $tanggalAkhir = Carbon::createFromFormat('Y-m', $bulanTahun)->endOfMonth();

            $query = Pendaftaran::join('profil as user_profile', 'user_profile.id_user', '=', 'pendaftarans.user_id')
                ->leftJoin('profil as admin_profile', 'admin_profile.id_user', '=', 'pendaftarans.admin_id')
                ->join('layanan', 'layanan.id_layanan', '=', 'pendaftarans.id_layanan')
                ->join('status', 'status.id', '=', 'pendaftarans.status')
                ->whereBetween('pendaftarans.created_at', [$tanggalAwal, $tanggalAkhir]);

            if ($request->id_layanan != 'all') {
                $query->where('pendaftarans.id_layanan', $request->id_layanan);
            }
            if ($request->id_status != 'all') {
                $query->where('pendaftarans.status', $request->id_status);
            } else {
                $query->where('pendaftarans.status', '!=', '1');
            }
            $pendaftaran = $query->select(
                'pendaftarans.*',
                'user_profile.nama as nama_user',
                'status.nama as nama_status',
                'layanan.nama_layanan',
                'admin_profile.nama as nama_admin'
            )
                ->get();
            $title = 'Periode ' . BulanHelper::getNamaBulan($monthYear[1]) . ' ' . $monthYear[0];
        }
        elseif($request->input == 'tahun'){
            if (!$request->tahun) {
                Alert::error('Gagal', 'Tahun Kosong');
                return back();
            }

            $tahun = $request->tahun;

            $tanggalAwal = Carbon::createFromFormat('Y', $tahun)->startOfYear();
            $tanggalAkhir = Carbon::createFromFormat('Y', $tahun)->endOfYear();

            $query = Pendaftaran::join('profil as user_profile', 'user_profile.id_user', '=', 'pendaftarans.user_id')
                ->leftJoin('profil as admin_profile', 'admin_profile.id_user', '=', 'pendaftarans.admin_id')
                ->join('layanan', 'layanan.id_layanan', '=', 'pendaftarans.id_layanan')
                ->join('status', 'status.id', '=', 'pendaftarans.status')
                ->whereBetween('pendaftarans.created_at', [$tanggalAwal, $tanggalAkhir]);

            if ($request->id_layanan != 'all') {
                $query->where('pendaftarans.id_layanan', $request->id_layanan);
            }

            if ($request->id_status != 'all') {
                $query->where('pendaftarans.status', $request->id_status);
            } else {
                $query->where('pendaftarans.status', '!=', '1');
            }

            $pendaftaran = $query->select(
                'pendaftarans.*',
                'user_profile.nama as nama_user',
                'status.nama as nama_status',
                'layanan.nama_layanan',
                'admin_profile.nama as nama_admin'
            )->get();

            $title = 'Tahun ' . $tahun;

        }

        $data = [
            'pendaftaran' => $pendaftaran,
            'title' => $title,
        ];

        $pdf = PDF::loadView('admin.pdf.preview', $data);
        $pdf->setPaper('A4', 'landscape');

        return response($pdf->output())->header('Content-Type', 'application/pdf');

    }

}
