<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Fakultas;
use App\Models\Lab;
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
            'fakultas' => 'Fakultas masih kosong',
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
            'fakultas' => 'Fakultas masih kosong',
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
        $user = Auth::user();
        $departemenList = DB::table("departemen")
            ->select("departemen.*", "fakultas.fakultas")
            ->join("fakultas", "departemen.id_fakultas", "fakultas.id_fakultas")
            ->orderBy("departemen.created_at", "desc")
            ->get();

        return view('superadmin.departemen', [
            'user' => $user,
            'departemenList' => $departemenList,
        ]);
    }

    public function addDepartemen() {
        $user = Auth::user();
        $fakultasList = Fakultas::whereNot("status", 0)->get();

        return view('superadmin.departemen.add-departemen', [
            'user' => $user,
            'fakultasList' => $fakultasList,
        ]);
    }

    public function storeDepartemen(Request $request) {
        $validatedData = $request->validate([
            'departemen' => 'required|string|max:255',
            'id_fakultas' => 'required|integer',
            'status' => 'required|string',
        ], [
            'departemen' => 'Departemen masih kosong',
            'id_fakultas' => 'Fakultas masih kosong',
            'status' => 'Pilih Aktif atau Non-Aktif',
        ]);

        Departemen::create([
            'departemen' => $validatedData['departemen'],
            'id_fakultas' => $validatedData['id_fakultas'],
            'status' => $validatedData['status'],
        ]);
        return redirect('/departemenSA')->with('success', 'Departemen baru berhasil dibuat');
    }

    public function editDepartemen($id) {
        $user = Auth::user();
        $selectedDepartemen = Departemen::find($id);
        $fakultasList = Fakultas::whereNot("status", 0)->get();

        return view('superadmin.departemen.edit-departemen', [
            'user' => $user,
            'selectedDepartemen' => $selectedDepartemen,
            'fakultasList' => $fakultasList,
        ]);
    }

    public function updateDepartemen(Request $request, $id) {
        $validatedData = $request->validate([
            'departemen' => 'required|string|max:255',
            'id_fakultas' => 'required|integer',
            'status' => 'required|string',
        ], [
            'departemen' => 'Departemen masih kosong',
            'id_fakultas' => 'Fakultas masih kosong',
            'status' => 'Pilih Aktif atau Non-Aktif',
        ]);

        $selectedDepartemen = Departemen::find($id);
        $selectedDepartemen->departemen = $validatedData['departemen'];
        $selectedDepartemen->id_fakultas = $validatedData['id_fakultas'];
        $selectedDepartemen->status = $validatedData['status'];
        $selectedDepartemen->save();
        return redirect('/departemenSA')->with('success', 'Data departemen berhasil diperbarui');
    }

    public function destroyDepartemen($id) {
        $selectedDepartemen = Departemen::find($id);
        $selectedDepartemen->delete();
        return redirect('/departemenSA')->with('success', 'Data departemen berhasil dihapus');
    }

    public function lab() {
        $user = Auth::user();
        $labData = DB::table('lab')
            ->select("lab.*", "departemen.departemen")
            ->join('departemen', 'lab.id_departemen', 'departemen.id_departemen')
            ->whereNot("departemen.status", 0)
            ->orderBy("lab.created_at", "desc")
            ->get();

        return view('superadmin.lab', [
            'user' => $user,
            'labData' => $labData,
        ]);
    }

    public function addLab() {
        $user = Auth::user();
        $departemenList = Departemen::whereNot("status", 0)->get();

        return view('superadmin.lab.add-lab', [
            'user' => $user,
            'departemenList' => $departemenList,
        ]);
    }

    public function storeLab(Request $request) {
        $validatedData = $request->validate([
            'lab' => 'required|string|max:255',
            'id_departemen' => 'required|integer',
            'status' => 'required|string',
        ], [
            'lab' => 'Lab masih kosong',
            'id_departemen' => 'Departemen masih kosong',
            'status' => 'Pilih Aktif atau Non-Aktif',
        ]);

        Lab::create([
            'lab' => $validatedData['lab'],
            'id_departemen' => $validatedData['id_departemen'],
            'status' => $validatedData['status'],
        ]);
        return redirect('/labSA')->with('success', 'Lab baru berhasil dibuat');
    }

    public function editLab($id) {
        $user = Auth::user();
        $departemenList = Departemen::whereNot("status", 0)->get();
        $selectedLab = Lab::find($id);

        return view('superadmin.lab.edit-lab', [
            'user' => $user,
            'departemenList' => $departemenList,
            'selectedLab' => $selectedLab,
        ]);
    }

    public function updateLab(Request $request, $id) {
        $validatedData = $request->validate([
            'lab' => 'required|string|max:255',
            'id_departemen' => 'required|integer',
            'status' => 'required|string',
        ], [
            'lab' => 'Lab masih kosong',
            'id_departemen' => 'Departemen masih kosong',
            'status' => 'Pilih Aktif atau Non-Aktif',
        ]);

        $selectedLab = Lab::find($id);
        $selectedLab->lab = $validatedData['lab'];
        $selectedLab->id_departemen = $validatedData['id_departemen'];
        $selectedLab->status = $validatedData['status'];
        $selectedLab->save();

        return redirect('/labSA')->with('success', 'Data lab berhasil diperbarui');
    }

    public function destroyLab($id) {
        $selectedLab = Lab::find($id);
        $selectedLab->delete();
        return redirect('/labSA')->with('success', 'Data lab berhasil dihapus');
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