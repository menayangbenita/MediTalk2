<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LaboratController extends Controller
{
    public function index()
    {
        $laborats = User::where('role', 'laborat')->get();
        return view('superadmin.laborat', compact('laborats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'laborat',
        ]);

        return redirect()->back()->with('success', 'Akun laborat berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $laborat = User::where('role', 'laborat')->findOrFail($id);
        $laborat->delete();

        return redirect()->back()->with('success', 'Akun laborat berhasil dihapus.');
    }
}
