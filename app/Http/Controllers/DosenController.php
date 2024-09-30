<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller {
    public function index() {
        $user = Auth::user();
        $dosenList = DB::table('dosens')
            ->select('dosens.*', 'departemen.departemen')
            ->join('departemen', 'dosens.id_departemen', 'departemen.id_departemen')
            ->where('dosens.id_departemen', $user->id_departemen)
            ->orderBy('dosens.created_at', 'desc')
            ->get();

        return view('admin.dosen', [
            'user' => $user,
            'dosenList' => $dosenList,
        ]);
    }

    public function addDosen() {
        $user = Auth::user();
        return view('admin.dosen.add-dosen', [
            'user' => $user,
        ]);
    }

    public function storeDosen(Request $request) {
        $user = Auth::user();
        $validatedData = $request->validate([
            'nama_dosen' => 'required|string|max:255',
        ], [
            'nama_dosen' => 'Nama dosen masih kosong',
        ]);
        Dosen::create([
            'nama_dosen' => $validatedData['nama_dosen'],
            'id_departemen' => $user->id_departemen,
        ]);
        return redirect('/dosen')->with('success', 'Dosen baru berhasil dibuat');
    }

    public function editDosen($id) {
        $user = Auth::user();
        $selectedDosen = Dosen::find($id);
        return view('admin.dosen.edit-dosen', [
            'user' => $user,
            'selectedDosen' => $selectedDosen,
        ]);
    }

    public function updateDosen(Request $request, $id) {
        $user = Auth::user();
        $validatedData = $request->validate([
            'nama_dosen' => 'required|string|max:255',
        ], [
            'nama_dosen' => 'Nama dosen masih kosong',
        ]);

        $selectedDosen = Dosen::find($id);
        $selectedDosen->nama_dosen = $validatedData['nama_dosen'];
        $selectedDosen->id_departemen = $user->id_departemen;
        $selectedDosen->save();
        return redirect('/dosen')->with('success', 'Data dosen berhasil diperbarui');
    }

    public function destroyDosen($id) {
        $selectedDosen = Dosen::find($id);
        $selectedDosen->delete();
        return redirect('/dosen')->with('success', 'Data dosen berhasil dihapus');
    }
}