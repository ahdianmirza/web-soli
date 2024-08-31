<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Alat;

class AlatController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $idDepartemen = $user->id_departemen;
        $alatData = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->select('a.id_alat', 'a.id_lab', 'a.nama_alat', 'a.spesifikasi', 'a.jumlah', 'a.kondisi_alat', 'l.lab', 'a.id_status', 'a.status')
            ->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')
            ->where('a.status', 1)
            ->where('d.id_departemen', $idDepartemen) 
            ->get();
        
        $labList = DB::table('lab')
            ->select('id_lab', 'lab', 'id_departemen')
            ->where('status', 1)
            ->where('id_departemen', $idDepartemen)
            ->get();

        $alatData = $alatData->map(function ($item, $index) {
            $item->nomor = $index + 1;  
            return $item;
        });

        return view('admin.alat', compact('alatData', 'user', 'labList'));
    }

    public function addAlatData(Request $request)
    {
        $validatedData = $request->validate([
            'id_lab' => 'required|exists:lab,id_lab',
            'nama_alat' => 'required|string|max:255',
            'spesifikasi' => 'required|string|max:500',
            'jumlah' => 'required|integer|min:1',
            'kondisi_alat' => 'required|string|max:100',
        ]);

        Alat::create([
            'id_lab' => $validatedData['id_lab'],
            'nama_alat' => $validatedData['nama_alat'],
            'spesifikasi' => $validatedData['spesifikasi'],
            'jumlah' => $validatedData['jumlah'],
            'kondisi_alat' => $validatedData['kondisi_alat'],
            'id_status' => 1, 
        ]);

        return redirect()->back()->with('success', 'Data Alat berhasil ditambahkan.');
    }

    // update alat
    public function updateAlatData(Request $request, $id)
    {
        $validatedData = $request->validate([
            'lab' => 'required|exists:lab,id_lab',
            'nama_alat' => 'required|string|max:255',
            'spesifikasi' => 'required|string|max:255',
            'jumlah' => 'required|integer|max:255',
            'kondisi_alat' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);

        $alat = Alat::find($id);

        if (!$alat) {
            return redirect()->route('admin.alat')->with('error', 'Data alat tidak ditemukan!');
        }

        $alat->id_lab = $validatedData['lab']; 
        $alat->nama_alat = $validatedData['nama_alat'];
        $alat->spesifikasi = $validatedData['spesifikasi'];
        $alat->jumlah = $validatedData['jumlah'];
        $alat->kondisi_alat = $validatedData['kondisi_alat'];
        $alat->id_status = $validatedData['status'];

        $alat->save();

        return redirect()->route('admin.alat')->with('success', 'Data laboratorium berhasil diperbarui!');
    }

    //hapus alat
    public function deleteAlatData($id)
    {
        $alat = Alat::find($id);

        if (!$alat) {
            return response()->json(['error' => 'Data alat tidak ditemukan!'], 404);
        }

        $alat->status = 0;
        $alat->save();

        return response()->json(['success' => 'Data alat berhasil dihapus!'], 200);
    }
}
