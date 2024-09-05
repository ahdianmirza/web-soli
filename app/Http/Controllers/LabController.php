<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Lab;
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
            ->where('l.id_departemen', $idDepartemen)
            ->where("l.status", 1)
            ->get();
        $labData = $labData->map(function ($item, $index) {
            $item->nomor = $index + 1; // Nomor urut mulai dari 1
            return $item;
        });

        return view('admin.lab', compact('labData', 'user'));
    }

    public function addLabIndex() {
        $user = Auth::user();
        $departments = Departemen::where("status", 1)->get();
        
        return view('admin.lab.add_lab', [
            "user" => $user,
            "departments" => $departments
        ]);
    }

    public function addLab(Request $request) {
        $validatedData = $request->validate([
            "lab" => "required|string|max:255",
            "id_departemen" => "required|integer",
        ]);

        Lab::create([
            "lab" => $validatedData['lab'],
            "id_departemen" => $validatedData['id_departemen']
        ]);

        return redirect('/lab')->with('success', "Data lab berhasil ditambahkan");
    }

    public function editLabIndex($id_lab) {
        $user = Auth::user();
        $departments = Departemen::where("status", 1)->get();
        $selectedLab = Lab::where("id_lab", $id_lab)
                        ->where("status", 1)
                        ->get();
        
        return view('admin.lab.edit_lab', [
            "user" => $user,
            "selectedLab" => $selectedLab,
            "departments" => $departments
        ]);
    }

    public function editLab(Request $request, $id_lab) {
        $validatedData = $request->validate([
            "lab" => "required|string|max:255",
            "id_departemen" => "required|integer",
        ]);

        $selectedLab = Lab::find($id_lab);
        $selectedLab->lab = $validatedData["lab"];
        $selectedLab->id_departemen = $validatedData["id_departemen"];
        $selectedLab->save();

        return redirect('/lab')->with("success", "Data lab berhasil diperbarui!");
    }

    public function deleteLab($id_lab) {
        $selectedLab = Lab::find($id_lab);
        // die($selectedLab);
        $selectedLab->status = 0;
        $selectedLab->save();
        return redirect('/lab')->with("success", "Data lab berhasil dihapus!");
    }
}