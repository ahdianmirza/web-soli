<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FakultasController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mengambil fakultas berdasarkan id_fakultas dari user yang login
        $fakultas = DB::table('fakultas')
            ->get();
        $fakultas = $fakultas->map(function ($item, $index) {
            $item->nomor = $index + 1; // Nomor urut mulai dari 1
            return $item;
        });
        return view('admin.fakultas', compact('fakultas', 'user'));
    }
}
