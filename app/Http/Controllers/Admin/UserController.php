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
use Log;
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
             <div class="">
            <a href="' . route('user.show', $user->id) . '"  class="btn btn-secondary btn-sm"> <i class="fa-regular fa-eye"></i></a>
                    <a href="' . route('user.edit', $user->id) . '"  class="btn btn-warning btn-sm"> <i class="fa-solid fa-pen"></i></a>
                    <a href="javascript:;" onclick="addForm(`' . route('user.destroy', $user->id) . '`)" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash"></i></a>
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:8', 'confirmed', Rules\Password::defaults()],
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:16', 'unique:' . User::class],
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
            'nik.required' => 'NIK harus diisi',
            'nik.min' => 'NIK minimal 16 karakter',
            'nik.max' => 'NIK maksimal 16 karakter',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.max' => 'Telepon maksimal 14 karakter',
            'nik.unique' => 'nik sudah digunakan',
            'name.unique' => 'nik sudah digunakan'

        ]);
        $user = User::create([
            'id' => Str::uuid(4),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'role' => 'p-desa'
        ]);
        Profil::create([
            'id_profil'=>Str::uuid(4),
            'id_user' => $user->id,
            'nama' => $request->name,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        
        ]);
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
        $data['user']= User::
        join('profil','profil.id_user','users.id')
        ->where('users.id',$id)
        ->select('users.*','profil.*')
        ->first();
        if (!$data['user']) {
            Alert::warning('Data Tidak Ditemukan');
            return redirect()->route('user.index');
        }
        return view('admin.user.show',$data);
    }
    public function edit($id){
        $data['title']='Edit Pegawai Desa';
        $data['route']=route('user.update',$id);
        $data['user']= User::
        leftJoin('profil','profil.id_user','users.id')
        ->where('users.id',$id)
        ->select('users.*','profil.*')
        ->first();
        return view('admin.user.edit',$data);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => ['required', 'min:8', 'confirmed', Rules\Password::defaults()],
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'nik' => 'required|string|min:14|max:16|unique:users,nik,' . $id,
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
            'nik.required' => 'NIK harus diisi',
            'nik.min' => 'NIK minimal 14 karakter',
            'nik.max' => 'NIK maksimal 16 karakter',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.max' => 'Telepon maksimal 14 karakter',
            'name.unique' => 'Username sudah digunakan',
            'nik.unique' => 'NIK sudah digunakan',
        ]);
     
        $user = User::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'nik' => $request->nik
        ]);
        $profil = Profil::where('id_user',$id)->first();
        if($profil){

            $profil->update([
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'telepon'=>$request->telepon,
            ]);
        }
        else{
            Profil::create([
                'id_profil'=>Str::uuid(4),
                 'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'telepon'=>$request->telepon,
                'id_user'=>$id
            ]);
        }
        Log::info('Berhasil Memperbarui User', [
            'user' => Auth::id(),
            'status' => 'Gagal',
            'newUser' => $id,
            'message' => 'User berhasil memperbarui data user',
        ]);
       Alert::success('Berhasil','Data telah diperbarui');
       return redirect()->route('user.index');
    }
}
