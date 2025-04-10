<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\SesiKonsultasi;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
    public function index($sesiId)
    {
        $sesi = SesiKonsultasi::findOrFail($sesiId);

        if (Auth::id() != $sesi->pasien_id && Auth::id() != $sesi->dokter_id) {
            abort(403); 
        }

        return view('pasien.konsultasi.chat', compact('sesi'));
    }

    // Ambil pesan-pesan
    public function getMessages($sesiId)
    {
        $messages = Chat::where('sesi_id', $sesiId)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }

    // Kirim pesan
    public function send(Request $request)
    {
        $request->validate([
            'sesi_id' => 'required|exists:sesi_konsultasi,id',
            'pesan' => 'required|string',
        ]);

        $sesi = SesiKonsultasi::findOrFail($request->sesi_id);

        if (Auth::id() != $sesi->pasien_id && Auth::id() != $sesi->dokter_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $receiverId = Auth::id() == $sesi->pasien_id ? $sesi->dokter_id : $sesi->pasien_id;

        $chat = Chat::create([
            'sesi_id' => $sesi->id,
            'sender_id' => Auth::id(),
            'pesan' => $request->message,
        ]);

        return response()->json($chat);
    }


    // public function send(Request $request)
    // {
    //     $request->validate([
    //         'sesi_id' => 'required|exists:sesi_konsultasi,id',
    //         'pesan' => 'required|string'
    //     ]);

    //     $sesi = SesiKonsultasi::find($request->sesi_id);

    //     if (now()->lt($sesi->start_time) || now()->gt($sesi->end_time)) {
    //         return response()->json(['error' => 'Sesi konsultasi tidak aktif'], 403);
    //     }

    //     $chat = Chat::create([
    //         'sesi_id' => $request->sesi_id,
    //         'sender_id' => Auth::id(),
    //         'pesan' => $request->message
    //     ]);

    //     return response()->json($chat);
    // }
}

