<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profil;
use Str;
use Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;
class UserController extends Controller
{
    public function index(){
        $data['create']=route('user.create');
        $data['title']='Pegawai Desa';
        return view('admin.user.index',$data);
    }
    public function data()
    {
        $user = User::where('role', 'p-desa')->get();
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
                
                    <li><a href="'.route('user.show',$user->id).'" class="dropdown-item">Lihat</a></li>
                    <li><a href="'.route('user.edit',$user->id).'" class="dropdown-item">Edit</a></li>
                    <li> <a href="javascript:;" onclick="addForm(`' . route('user.destroy', $user->id) . '`)" class="dropdown-item">
                   Hapus </a></li>

                </ul>
            </div>
            ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create(){
        $data['title']='Tambah Pegawai Desa';
        $data['route']=route('user.store');
        return view('admin.user.create',$data);
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required','min:8', 'confirmed', Rules\Password::defaults()],
            'nama'=>['required', 'string', 'max:255'],
            'alamat'=>['required','string', 'max:255'],
            'nip'=>['required','string', 'min:18' ,'max:18'],
            'telepon'=>['required','string', 'max:14']

            
        ], [
            'name.required' => 'Username harus diisi',
            'name.max'=>'Username maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email'=>'Format Email salah ',
            'email.unique'=>'Email sudah terdaftar',
            'email.max'=>'Email maksimal 255 karakter',
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
            'role' => 'p-desa'
        ]);
        Profil::create([
            'id_profil'=>Str::uuid(4),
            'id_user' => $user->id,
            'nama' => $request->name,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'nip' => $request->nip,]);
        Log::info('Berhasil Menambahkan User', [
            'user' => Auth::id(),
            'status' => 'Gagal',
            'newUser' => $user->id,
            'message' => 'User berhasil menambahkan user baru',
        ]);
        Alert::success('Data Berhasil Ditambahkan');
        return redirect()->route('user.index');
    }
    public function destroy($id){
        Profil::where('id_user',$id)->delete();
        User::where('id',$id)->delete();
        Log::info('Berhasil Meenghapus User', [
            'user' => Auth::id(),
            'status' => 'Gagal',
            'newUser' => $id,
            'message' => 'User berhasil menghapus user',
        ]);
        Alert::success('Berhasil','Data telah dihapus');
        return redirect()->route('user.index');
    }
    public function show($id){
        $data['title']='Pegawai Desa';
        $data['user']= DB::table('users')
        ->join('profil','profil.id_user','users.id')
        ->where('users.id',$id)
        ->select('users.*','profil.*')
        ->first();
        return view('admin.user.show',$data);
    }
    public function edit($id){
        $data['title']='Edit Pegawai Desa';
        $data['route']=route('user.update',$id);
        $data['user']= DB::table('users')
        ->join('profil','profil.id_user','users.id')
        ->where('users.id',$id)
        ->select('users.*','profil.*')
        ->first();
        return view('admin.user.edit',$data);
    }
    public function update(Request $request, $id){
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
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $profil = Profil::where('id_user',$id)->update([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
            'nip'=>$request->nip,
        ]);
        Log::info('Berhasil Memperbarui User', [
            'user' => Auth::id(),
            'status' => 'Gagal',
            'newUser' => $user->id,
            'message' => 'User berhasil memperbarui data user',
        ]);
       Alert::success('Berhasil','Data telah diperbarui');
       return redirect()->route('user.index');
    }
}
