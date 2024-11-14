<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\LiveChat;

class ChatController extends Controller
{
    public function clearChats()
    {
        // Menghapus isi folder public/img/chats/
        Storage::disk('public')->deleteDirectory('img/chats');

        // Menghapus data di tabel live_chats
        LiveChat::truncate();

        return redirect()->back()->with('status', 'Chats cleared successfully!');
    }
}
