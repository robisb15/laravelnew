<?php

namespace App\Livewire;

use \App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Berkas;
use Str;
use DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Message extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $message = '';
    public $users;
    public $clicked_user;
    public $messages;
    public $file;
    public $admin;

    public function render()
    {

        return view('livewire.message', [
            'users' => $this->users,
            'admin' => $this->admin,
            
            
        ]);
    }

    public function mount()
    {
        $this->mountComponent();
    }

    public function mountComponent()
    {
        if (auth()->user()->role != 'admin') {
            $this->messages = \App\Models\Message::where('user_id', auth()->id())
                ->orWhere('receiver', auth()->id())
                ->join('users as sender', 'sender.id', '=', 'messages.user_id')
                ->join('users as receiver', 'receiver.id', '=', 'messages.receiver')
                ->select('messages.*', 'sender.name as sender_name', 'receiver.name as receiver_name')
                ->orderBy('created_at', 'DESC')
                ->get();
        } else {
            $this->messages = \App\Models\Message::where('user_id', $this->clicked_user)
                ->orWhere('receiver', $this->clicked_user)
                ->orderBy('created_at', 'DESC')
                ->get();
        }
        $this->users = User::leftJoin('messages', 'messages.user_id', '=', 'users.id')
            ->where('users.role', '<>', 'admin')
            ->select('users.*', DB::raw('MAX(messages.created_at) as latest_message_date'))
            ->groupBy('users.id')
            ->orderBy('latest_message_date', 'DESC')
            ->get();
        $this->admin = \App\Models\User::where('role', 'admin')->first();
    }

    public function SendMessage()
    {
        if ($this->file) {
            $allowedExtensions = ['pdf', 'jpg', 'mkv', 'mp3','jpeg','png','mp4','doc','docx']; // Ekstensi yang diizinkan

            $extension = $this->file->getClientOriginalExtension();
            if (!in_array($extension, $allowedExtensions)) {
                $this->alert('warning', 'Format file tidak didukung');
                return;
            }
        }
        $new_message = new \App\Models\Message();
        $new_message->message = $this->message;
        $new_message->user_id = auth()->id();
        if (auth()->user()->role != 'admin') {
            $admin = User::where('role', 'admin')->first();
            $this->user_id = $admin->id;
        } else {
            $this->user_id = $this->clicked_user->id;
        }
        $new_message->receiver = $this->user_id;

        // Deal with the file if uploaded
        if ($this->file) {
            $newname= $this->file->getClientOriginalName();
            Storage::putFileAs('public/message', $this->file, $newname);
            $berkas = Berkas::create([
                'id_berkas' => Str::uuid(4),
                'nama_file' => $newname,
                'url' => 'public/message/' . $newname,
                'jenis_file' => 'pdf',
                'status' => '1'
            ]);
            $id_berkas = $berkas->id_berkas;
            $new_message->id_berkas = $id_berkas;
        }
        $new_message->id_message = Str::uuid(4);
        $new_message->is_seen = 0;
        $new_message->save();

        // Clear the message after it's sent
        $this->reset(['message']);
        $this->file = '';
    }

    public function getUser($user_id)
    {
        $this->clicked_user = User::find($user_id);
        $this->messages = \App\Models\Message::where('user_id', $user_id)->get();
    }

    public function resetFile()
    {
        $this->reset('file');
    }
}
