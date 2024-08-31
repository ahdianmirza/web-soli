<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LabController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Ambil id_fakultas dari user yang sedang login
        $idDepartemen = $user->id_departemen;

        // Ambil data lab yang terkait dengan id_departemen dari user
        $labData = DB::table('lab as l')
            ->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')
            ->where('l.id_departemen', $idDepartemen) // Menyaring berdasarkan id_fakultas user
            ->get();
        $labData = $labData->map(function ($item, $index) {
            $item->nomor = $index + 1; // Nomor urut mulai dari 1
            return $item;
        });

        return view('admin.lab', compact('labData', 'user'));
    }
}
