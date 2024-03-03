<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;
use App\Models\User;
use App\Models\Berkas;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use DB;

class Show extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $users;
    public $messages = '';
    public $sender;
    public $message;
    public $file;
    public $not_seen;

    public function render()
    {
        return view('livewire.show', [
            'users' => $this->users,
            'messages' => $this->messages,
            'sender' => $this->sender
        ]);
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
            $this->messages = \App\Models\Message::where('user_id', $this->sender->id)
                ->orWhere('receiver', $this->sender->id)
                ->join('users as sender', 'sender.id', '=', 'messages.user_id')
                ->join('users as receiver', 'receiver.id', '=', 'messages.receiver')
                ->select('messages.*', 'sender.name as sender_name', 'receiver.name as receiver_name')
                ->orderBy('created_at', 'DESC')
                ->get();
        }
        $this->users = User::leftJoin('messages', 'messages.user_id', '=', 'users.id')
            ->where('users.role', '<>', 'admin')
            ->select('users.*', DB::raw('MAX(messages.created_at) as latest_message_date'))
            ->groupBy('users.id')
            ->orderBy('latest_message_date', 'DESC')
            ->get();
        $not_seen = \App\Models\Message::where('user_id', $this->sender->id)->orWhere('user_id',auth()->id())->where('receiver', auth()->id())->orWhere('receiver', $this->sender->id);
        $not_seen->update(['is_seen' => true]);
    }

    public function mount()
    {
        return $this->mountComponent();
    }

    public function SendMessage()
    {
        if ($this->file) {
            $allowedExtensions = ['pdf', 'jpg', 'mkv', 'mp3', 'jpeg', 'png', 'mp4', 'doc', 'docx']; // Ekstensi yang diizinkan

            $extension = $this->file->getClientOriginalExtension();
            if (!in_array($extension, $allowedExtensions)) {
                $this->alert('warning', 'Format file tidak didukung');
                return;
            }
        }
        $new_message = new \App\Models\Message();
        $new_message->message = $this->message;
        $new_message->user_id = auth()->id();
        $new_message->receiver = $this->sender->id;

        // Deal with the file if uploaded
        // Deal with the file if uploaded
        if ($this->file) {
            $newname = $this->file->getClientOriginalName();
            Storage::putFileAs('public/message', $this->file, $newname);
            $berkas = Berkas::create([
                'id_berkas' => Str::uuid(4),
                'nama_file' => $newname,
                'url' => 'public/message/' . $newname,
                'jenis_file' => $this->file->getClientOriginalExtension(),
                'status' => '1'
            ]);
            $id_berkas = $berkas->id_berkas;
            $new_message->id_berkas = $id_berkas;
        }
        $new_message->id_message = Str::uuid(4);
        $new_message->is_seen = 0;
        $new_message->save();
        // Clear the message after it's sent
        $this->reset('message');
        $this->file = '';
    }

    public function resetFile()
    {
        $this->reset('file');
    }

    public function uploadFile()
    {
        $file = $this->file->store('public/files');
        $path = url(Storage::url($file));
        $file_name = $this->file->getClientOriginalName();
        return [$path, $file_name];
    }

}
