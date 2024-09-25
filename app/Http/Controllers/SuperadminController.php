<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuperadminController extends Controller {
    public function index() {
        $user = Auth::user();
        $fakultas = DB::table('fakultas')
            ->get();
        $departemen = DB::table('departemen as d')
            ->join('fakultas as f', 'd.id_fakultas', '=', 'f.id_fakultas')
            ->get();
        $labData = DB::table('lab as l')
            ->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')
            ->join('fakultas as f', 'd.id_fakultas', '=', 'f.id_fakultas')
            ->get();
        $alatData = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')
            ->join('fakultas as f', 'd.id_fakultas', '=', 'f.id_fakultas')
            ->get();
        $users = DB::table('users')->get();

        $jumlahFakultas = $fakultas->count();
        $jumlahDepartemen = $departemen->count();
        $jumlahLab = $labData->count();
        $jumlahAlat = $alatData->count();
        $jumlahUser = $users->count();

        return view('superadmin.index', compact('user', 'fakultas', 'departemen', 'labData', 'alatData', 'users',
            'jumlahFakultas', 'jumlahDepartemen', 'jumlahLab', 'jumlahAlat', 'jumlahUser'));
    }

    public function fakultas() {
        $user = Auth::user();
        $fakultasList = Fakultas::orderBy("created_at", "desc")->get();
        return view('superadmin.fakultas', [
            'user' => $user,
            'fakultasList' => $fakultasList,
        ]);
    }

    public function addFakultas() {
        $user = Auth::user();

        return view('superadmin.fakultas.add-fakultas', [
            'user' => $user,
        ]);
    }

    public function storeFakultas(Request $request) {
        $validatedData = $request->validate([
            'fakultas' => 'required|string|max:255',
            'status' => 'required|string',
        ], [
            'fakultas' => 'Note masih kosong',
            'status' => 'Pilih Aktif atau Non-Aktif',
        ]);
        Fakultas::create([
            'fakultas' => $validatedData['fakultas'],
            'status' => $validatedData['status'],
        ]);
        return redirect('/fakultasSA')->with('success', 'Fakultas baru berhasil dibuat');
    }

    public function editFakultas($id) {
        $user = Auth::user();
        $selectedFakultas = Fakultas::where("id_fakultas", $id)->first();

        return view('superadmin.fakultas.edit-fakultas', [
            'user' => $user,
            'selectedFakultas' => $selectedFakultas,
        ]);
    }

    public function updateFakultas(Request $request, $id_fakultas) {
        $validatedData = $request->validate([
            'fakultas' => 'required|string|max:255',
            'status' => 'required|string',
        ], [
            'fakultas' => 'Note masih kosong',
            'status' => 'Pilih Aktif atau Non-Aktif',
        ]);

        $selectedFakultas = Fakultas::find($id_fakultas);
        if ($selectedFakultas) {
            $selectedFakultas->fakultas = $validatedData['fakultas'];
            $selectedFakultas->status = $validatedData['status'];
            $selectedFakultas->save();
        } else {
            return response()->json(['error' => 'Fakultas tidak ditemukan'], 404);

            return redirect('/fakultasSA')->with('error', 'Terjadi error');
        }

        return redirect('/fakultasSA')->with('success', 'Data fakultas berhasil diperbarui');
    }

    public function destroyFakultas($id_fakultas) {
        $selectedFakultas = Fakultas::find($id_fakultas);
        $selectedFakultas->delete();
        return redirect('/fakultasSA')->with('success', 'Data fakultas berhasil dihapus');
    }

    public function departemen() {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mengambil departemen berdasarkan id_fakultas dari user yang login
        $departemen = DB::table('departemen as d')
            ->join('fakultas as f', 'd.id_fakultas', '=', 'f.id_fakultas')
            ->get();
        $departemen = $departemen->map(function ($item, $index) {
            $item->nomor = $index + 1; // Nomor urut mulai dari 1
            return $item;
        });
        $users = DB::table('users')->get(); // Jika kamu masih memerlukan data users

        return view('superadmin.departemen', compact('departemen', 'user'));
    }

    public function lab() {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Ambil data lab yang terkait dengan id_fakultas dari user
        $labData = DB::table('lab as l')
            ->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')
            ->join('fakultas as f', 'd.id_fakultas', '=', 'f.id_fakultas')
            ->get();
        $labData = $labData->map(function ($item, $index) {
            $item->nomor = $index + 1; // Nomor urut mulai dari 1
            return $item;
        });

        return view('superadmin.lab', compact('labData', 'user'));
    }

    public function alat() {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Ambil data alat yang terkait dengan id_fakultas dari user
        $alatData = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')
            ->join('fakultas as f', 'd.id_fakultas', '=', 'f.id_fakultas')
            ->get();

        $alatData = $alatData->map(function ($item, $index) {
            $item->nomor = $index + 1; // Nomor urut mulai dari 1
            return $item;
        });

        return view('superadmin.alat', compact('alatData', 'user'));
    }

    public function user() {
        $user = Auth::user();
        $users = DB::table('users')->get();
        $users = $users->map(function ($item, $index) {
            $item->nomor = $index + 1;
            return $item;
        });

        return view('superadmin.user', compact('user', 'users'));
    }

    public function peminjaman() {
        $user = Auth::user();
        $peminjaman = DB::table('transaksi as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')
            ->join('fakultas as f', 'd.id_fakultas', '=', 'f.id_fakultas')
            ->join('alat as t', 'a.id_alat', '=', 't.id_alat')
            ->get();

        $peminjaman = $peminjaman->map(function ($item, $index) {
            $item->nomor = $index + 1;
            return $item;
        });
        return view('superadmin.peminjaman', compact('peminjaman', 'user'));
    }
}