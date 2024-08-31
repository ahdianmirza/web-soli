<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dosen = DB::table('dosen')
            ->join('departemen', 'dosen.id_departemen', '=', 'departemen.id_departemen')
            ->where('dosen.id_departemen', $user->id_departemen)
            ->get();

        return view('admin.dosen', compact('user', 'dosen'));
    }
}
