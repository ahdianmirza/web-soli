<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlatController extends Controller {
    public function index() {
        $user = Auth::user();
        $idLab = $user->id_lab;
        $alatData = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->select('a.id_alat', 'a.id_lab', 'a.nama_alat', 'a.spesifikasi', 'a.jumlah', 'a.kondisi_alat', 'l.lab', 'a.id_status', 'a.status')
            ->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')
            ->where('a.status', 1)
            ->where('l.id_lab', $idLab)
            ->orderBy('a.created_at', "DESC")
            ->get();

        $alatData = $alatData->map(function ($item, $index) {
            $item->nomor = $index + 1;
            return $item;
        });

        $titleAlat = "Delete Alat";
        $textAlat = "Yakin untuk menghapus ini?";
        confirmDelete($titleAlat, $textAlat);

        return view('admin.alat', compact('alatData', 'user'));
    }

    public function addAlatIndex() {
        $user = Auth::user();
        return view('admin.alat.add_alat', [
            "user" => $user,
        ]);
    }

    public function addAlatData(Request $request) {
        $user = Auth::user();
        $idLab = $user->id_lab;

        $validatedData = $request->validate([
            'nama_alat' => 'required|string|max:255',
            'spesifikasi' => 'required|string|max:500',
            'jumlah' => 'required|integer|min:1',
            'kondisi_alat' => 'required|string|max:100',
        ]);

        Alat::create([
            'id_lab' => $idLab,
            'nama_alat' => $validatedData['nama_alat'],
            'spesifikasi' => $validatedData['spesifikasi'],
            'jumlah' => $validatedData['jumlah'],
            'kondisi_alat' => $validatedData['kondisi_alat'],
            'id_status' => 1,
        ]);

        return redirect('/alat')->with('success', 'Data alat berhasil ditambahkan.');
    }

    // update alat
    public function updateAlatIndex($id_alat) {
        $user = Auth::user();
        $selectedAlat = Alat::where("id_alat", $id_alat)->get();
        return view("admin.alat.edit_alat", [
            "selectedAlat" => $selectedAlat,
            "user" => $user,
        ]);
    }

    public function updateAlatData(Request $request, $id) {
        $user = Auth::user();
        $idLab = $user->id_lab;
        $validatedData = $request->validate([
            'nama_alat' => 'required|string|max:255',
            'spesifikasi' => 'required|string|max:255',
            'jumlah' => 'required|integer|max:255',
            'kondisi_alat' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);

        $alat = Alat::find($id);

        if (!$alat) {
            return redirect('/alat')->with('error', 'Data alat tidak ditemukan!');
        }

        $alat->id_lab = $idLab;
        $alat->nama_alat = $validatedData['nama_alat'];
        $alat->spesifikasi = $validatedData['spesifikasi'];
        $alat->jumlah = $validatedData['jumlah'];
        $alat->kondisi_alat = $validatedData['kondisi_alat'];
        $alat->id_status = $validatedData['status'];
        $alat->save();

        return redirect('/alat')->with('success', 'Data alat berhasil diperbarui!');
    }

    //hapus alat
    public function deleteAlatData($id) {
        $alat = Alat::find($id);

        if (!$alat) {
            return response()->json(['error' => 'Data alat tidak ditemukan!'], 404);
        }

        $alat->status = 0;
        $alat->save();

        return redirect('/alat')->with("success", "Alat berhasil dihapus");
    }
}