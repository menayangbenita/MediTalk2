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

    public function getMessages($sesiId)
    {
        $messages = Chat::where('sesi_id', $sesiId)
            ->with('sender') 
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($msg) {
                return [
                    'id' => $msg->id,
                    'sender_id' => $msg->sender_id,
                    'sender_name' => $msg->sender->name ?? 'Unknown',
                    'pesan' => $msg->pesan,
                    'created_at' => $msg->created_at->format('H:i'),
                ];
            });

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $request->validate([
            'sesi_id' => 'required|exists:sesi_konsultasi,id',
            'pesan' => 'required|string',
        ]);

        $dokter = Auth::user()->dokter;
        $sesi = SesiKonsultasi::findOrFail($request->sesi_id);

        if (Auth::id() != $sesi->pasien_id &&  $dokter->id != $sesi->dokter_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $receiverId = Auth::id() == $sesi->pasien_id ? $sesi->dokter_id : $sesi->pasien_id;

        $chat = Chat::create([
            'sesi_id' => $sesi->id,
            'sender_id' => Auth::id(),
            'pesan' => $request->pesan,
        ]);

        return response()->json([
            'message' => 'Pesan berhasil dikirim.',
            'data' => $chat,
        ]);
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
