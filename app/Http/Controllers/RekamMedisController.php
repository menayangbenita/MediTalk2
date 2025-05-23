<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\User;
use App\Models\SesiKonsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::with('pasien', 'dokter')->orderBy('tanggal', 'desc')->get();
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('laborat.rekam-medis', compact('rekamMedis', 'pasiens', 'dokters'));
    }

    public function rekamMedisPasien()
    {
        $user = Auth::user();
        $dokter = Auth::User()->dokter;
        $dokter_id = $user->dokter->id;

        $pasien_id = SesiKonsultasi::where('dokter_id', $dokter_id)
            ->pluck('pasien_id');

        $rekamMedis = RekamMedis::whereIn('pasien_id', $pasien_id)->orderBy('tanggal', 'desc')->get();

        return view('dokter.rekam-medis', compact('dokter', 'rekamMedis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tanggal' => 'required|date',
        ]);

        RekamMedis::create($request->all());

        return redirect()->route('laborat.rekammedis.index')->with('success', 'Rekam medis berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rekam = RekamMedis::findOrFail($id);
        $pasiens = Pasien::all();
        $dokters = User::where('role', 'dokter')->get();
        return view('laborat.edit-rekam-medis', compact('rekam', 'pasiens', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        $rekam = RekamMedis::findOrFail($id);
        $rekam->update($request->all());

        return redirect()->route('laborat.rekammedis.index')->with('success', 'Rekam medis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        RekamMedis::destroy($id);
        return back()->with('success', 'Rekam medis berhasil dihapus.');
    }
}
