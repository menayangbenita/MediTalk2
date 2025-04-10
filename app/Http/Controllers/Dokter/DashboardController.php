<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dokter;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $dokter= Auth::User()->dokter;
        return view('dokter.index', compact('dokter'));
    }
}
