<div>
    <div class="row justify-content-center" wire:poll="mountComponent()">
        @if (auth()->user()->role == 'admin')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header" style="background-color: #9BCF53">
                        Users
                    </div>

                    <div class="card-body chatbox p-0">
                        <ul class="list-group list-group-flush">
                            @foreach ($users as $user)
                                @php
                                    $not_seen =
                                        App\Models\Message::where('user_id', $user->id)
                                            ->where('is_seen', 0)
                                            ->get() ?? null;
                                @endphp
                                <a href="{{ route('inbox.show', $user->id) }}" class="text-dark link">
                                    <li class="list-group-item">
                                        <img class="img-fluid avatar"
                                            src="{{ asset('SqvNR7QrAdmin') }}/img/logoUser.png">
                                        @if ($user->is_online)
                                            <i class="fa fa-circle text-success online-icon"></i>
                                        @endif {{ $user->name }}
                                        @if (filled($not_seen))
                                            <div class="badge text-bg-success">{{ $not_seen->count() }}</div>
                                        @endif
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #9BCF53">
                    @if (isset($clicked_user))
                        {{ $clicked_user->name }}
                    @elseif(auth()->user()->role == 'admin')
                        Select a user to see the chat
                    @elseif($admin->is_online)
                        <i class="fa fa-circle text-success"></i> We are online
                    @else
                        Messages
                    @endif
                </div>
                <div class="card-body message-box">

                    @if (!$messages)
                        No messages to show
                    @else
                        @if (isset($messages))
                            @foreach ($messages as $message)
                                <div
                                    class="single-message @if ($message->user_id !== auth()->id()) received @else sent @endif">
                                    
                                    @if( $message->sender_name)
                                    <p class="font-weight-bolder my-0">{{ $message->sender_name }}</p>
                                    @elseif($message->receiver_name)
                                    <p class="font-weight-bolder my-0">{{ $message->receiver_name }}</p>
                                    @endif
                                    <p class="my-0">{{ $message->message }}</p>
                                    @php
                                        $berkas = \App\Models\Berkas::find($message->id_berkas);
                                    @endphp
                                    @if ($berkas)
                                        @if (isPhoto($berkas->nama_file))
                                            <div class="w-100 my-2">
                                                <img class="img-fluid rounded" loading="lazy" style="height: 250px"
                                                    src="{{ url('file/view-file/' . $berkas->id_berkas) }}">

                                            </div>
                                        @elseif (isVideo($berkas->nama_file))
                                            <div class="w-100 my-2">
                                                <video style="height: 250px" class="img-fluid rounded" controls>
                                                    <source src="{{ url('file/view-file/' . $berkas->id_berkas) }}">
                                                </video>
                                            </div>
                                        @elseif ($berkas->nama_file)
                                            <div class="w-100 my-2">
                                                <a href="{{ url('file/view-file/' . $berkas->id_berkas) }}"
                                                    class="bg-light p-2 rounded-pill" target="_blank" download><i
                                                        class="fa fa-download"></i>
                                                    {{ $berkas->nama_file }}
                                                </a>
                                            </div>
                                        @endif
                                    @endif
                                    <small class="text-muted w-100">Sent <em>{{ $message->created_at }}</em></small>
                                </div>
                            @endforeach
                        @else
                            No messages to show
                        @endif
                        @if (!isset($clicked_user) and auth()->user()->is_admin == true)
                            Click on a user to see the messages
                        @endif
                    @endif
                </div>
                @if (auth()->user()->role != 'admin')
                    <div class="card-footer">
                        <form wire:submit.prevent="SendMessage" enctype="multipart/form-data">
                            <div wire:loading wire:target='SendMessage'>
                                Sending message . . .
                            </div>
                            <div wire:loading wire:target="file">
                                Uploading file . . .
                            </div>
                            @if ($file)
                                <div class="mb-2">
                                    You have an uploaded file <button type="button" wire:click="resetFile"
                                        class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Remove
                                        {{ $file->getClientOriginalName() }}</button>
                                </div>
                            @else
                                No file is uploaded.
                            @endif
                            <div class="row">
                                <div class="col-md-7">
                                    <input wire:model="message"
                                        class="form-control input shadow-none w-100 d-inline-block"
                                        placeholder="Type a message" @if (!$file) required @endif>
                                </div>
                                @if (empty($file))
                                    <div class="col-md-1">
                                        <button type="button" class="border" id="file-area">
                                            <label>
                                                <i class="fa fa-file-upload"></i>
                                                <input type="file" wire:model="file">
                                            </label>
                                        </button>
                                    </div>
                                @endif
                                <div class="col-md-4">
                                    <button class="btn btn-primary d-inline-block w-100"><i
                                            class="far fa-paper-plane"></i> Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
