<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Message};
use Illuminate\Support\Facades\Cache;
use DB;

class MessageController extends Controller
{
    public function index()
    {
        // Show just the users and not the admins as well
        $users = User::leftJoin('messages', 'messages.user_id', '=', 'users.id')
            ->where('users.role', '<>', 'admin')
            ->select('users.*', DB::raw('MAX(messages.created_at) as latest_message_date'))
            ->groupBy('users.id')
            ->orderBy('latest_message_date', 'DESC')
            ->get();



        // dd($users);

        if (auth()->user()->role != 'admin') {
            $messages = Message::where('user_id', auth()->id())->orderBy('id_message', 'DESC')->get();
        }
      
        if(\Auth::user()->role == 'admin') {
            return view('admin.message.home', [
            'users' => $users,
            'messages' => $messages??null
        ]);
    
        }
        else{
            return view('p-desa.message.home', [
            'users' => $users,
            'messages' => $messages??null
        ]);
    }
        }
        

    public function show($id)
    {
        if (auth()->user()->role != 'admin') {
            abort(404);
        }

        $sender = User::findOrFail($id);
        $tess = Message::where('user_id', $id)->where('is_seen', 0)->update(['is_seen' => 1]);



        $users = User::with([
            'messages' => function ($query) {
                $query->orderBy('created_at', 'DESC');
            }
        ])
            ->where('role', '<>', 'admin')
            ->orderBy('id', 'DESC') // Urutkan pengguna berdasarkan kolom 'id' pada tabel 'users'
            ->get();



        if (auth()->user()->role != 'admin') {
            $messages = Message::where('user_id', auth()->id())->orderBy('id_message', 'DESC')->get();
        } else {
            $messages = Message::where('user_id', $sender)->orderBy('id_message', 'DESC')->get();
        }
        if (\Auth::user()->role == 'admin') {
            return view('admin.message.show', [
                'users' => $users,
                'messages' => $messages,
                'sender' => $sender,
            ]);
        } else {
            return view('p-desa.message.show', [
                'users' => $users,
                'messages' => $messages,
                'sender' => $sender,
            ]);
        }
        
    }
}
