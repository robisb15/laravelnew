<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pendaftaran;
use App\Models\Profil;
use Str;
use DB;
use Hash;
use Illuminate\Validation\Rules;
use Alert;
use Log;
use Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data['totalTotal'] = Pendaftaran::where('status', '!=','1')->count();
        $data['totalProses'] = Pendaftaran::where('status', 3)->count();
        $data['totalSelesai'] = Pendaftaran::where('status', 4)->count();
        $data['totalTolak'] = Pendaftaran::where('status', 5)->count();
        return view('admin.dashboard',$data);
    }
    public function index()
    {
        $data['create'] = route('admin.create');
        $data['title'] = 'Admin';
        return view('admin.admin.index', $data);
    }
    public function data()
    {
        $user = User::where('role', 'admin')->get();
        return datatables()
            ->of($user)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                return '
            <div class="dropdown">
                <button class="btn btn-warning dropdown-toggle" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Aksi
                </button>
                <ul class="dropdown-menu">
                
                    <li><a href="' . route('admin.show', $user->id) . '" class="dropdown-item">Lihat</a></li>
                    <li><a href="' . route('admin.edit', $user->id) . '" class="dropdown-item">Edit</a></li>
                    <li> <a href="javascript:;" onclick="addForm(`' . route('admin.destroy', $user->id) . '`)" class="dropdown-item">
                   Hapus </a></li>

                </ul>
            </div>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create()
    {
        $data['route'] = route('admin.store');
        $data['title'] = 'Tambah Admin';
        return view('admin.user.create', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:8', 'confirmed', Rules\Password::defaults()],
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'min:18', 'max:18'],
            'telepon' => ['required', 'string', 'max:14']


        ], [
            'name.required' => 'Username harus diisi',
            'name.max' => 'Username maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format Email salah ',
            'email.unique' => 'Email sudah terdaftar',
            'email.max' => 'Email maksimal 255 karakter',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Konfirmasi Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama maksimal 255 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.max' => 'Alamat maksimal 255 karakter',
            'nip.required' => 'NIP harus diisi',
            'nip.min' => 'NIP minimal 18 karakter',
            'nip.max' => 'NIP maksimal 18 karakter',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.max' => 'Telepon maksimal 14 karakter',
        ]);
        $user = User::create([
            'id' => Str::uuid(4),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);
        Profil::create([
            'id_profil' => Str::uuid(4),
            'id_user' => $user->id,
            'nama' => $request->name,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'nip' => $request->nip,
        ]);
        Log::info('Berhasil Menambahkan User', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'newUser' => $user->id,
            'message' => 'User berhasil menambahkan admin',
        ]);
        Alert::success('Data Berhasil Ditambahkan');
        return redirect()->route('admin.index');
    }
    public function show($id)
    {
        $data['title'] = 'Admin';
        $data['user'] = DB::table('users')
            ->join('profil', 'profil.id_user', 'users.id')
            ->where('users.id', $id)
            ->select('users.*', 'profil.*')
            ->first();
        return view('admin.user.show', $data);
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Admin';
        $data['route'] = route('admin.update', $id);
        $data['user'] = DB::table('users')
            ->join('profil', 'profil.id_user', 'users.id')
            ->where('users.id', $id)
            ->select('users.*', 'profil.*')
            ->first();
        return view('admin.user.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => ['required', 'min:8', 'confirmed', Rules\Password::defaults()],
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'min:18', 'max:18'],
            'telepon' => ['required', 'string', 'max:14']
        ], [
            'name.required' => 'Username harus diisi',
            'name.max' => 'Username maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format Email salah ',
            'email.unique' => 'Email sudah terdaftar',
            'email.max' => 'Email maksimal 255 karakter',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Konfirmasi Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama maksimal 255 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.max' => 'Alamat maksimal 255 karakter',
            'nip.required' => 'NIP harus diisi',
            'nip.min' => 'NIP minimal 18 karakter',
            'nip.max' => 'NIP maksimal 18 karakter',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.max' => 'Telepon maksimal 14 karakter',
        ]);
        $user = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Profil::where('id_user', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'nip' => $request->nip,
        ]);
        Log::info('Berhasil Memperbarui Admin', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'admin' => $user->id,
            'message' => 'User berhasil memperbarui data admin',
        ]);
        Alert::success('Berhasil', 'Data telah diperbarui');
        return redirect()->route('admin.index');
    }
    public function destroy($id)
    {
        if (count(User::where('role', 'admin')->get()) <= 1) {
            Log::warning('Gagal menghapus Admin', [
                'user' => Auth::id(),
                'status' => 'Gagal',
                'admin' => $id,
                'message' => 'User gagal menghapus data admin terakhir',
            ]);
            Alert::error('Gagal', 'Data admin terakhir');
            return redirect()->route('admin.index');
        }
        Profil::where('id_user', $id)->delete();
        User::where('id', $id)->delete();
        Log::info('Berhasil Menghapus Admin', [
            'user' => Auth::id(),
            'status' => 'Berhasil',
            'admin' => $id,
            'message' => 'User berhasil menghapus data admin',
        ]);
        Alert::success('Berhasil', 'Data telah dihapus');
        return redirect()->route('admin.index');
    }
}
