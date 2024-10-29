<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Departemen;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SuperadminController extends Controller {
    public function index() {
        $user = Auth::user();
        $fakultas = DB::table('fakultas')
            ->select("id_fakultas")
            ->count();
        $departemen = DB::table('departemen')
            ->select("id_departemen")
            ->count();
        $labData = DB::table('lab')
            ->select("id_lab")
            ->count();
        $alatData = DB::table('alat')
            ->select("id_alat")
            ->count();
        $users = DB::table('users')
            ->select("id")
            ->count();

        return view('superadmin.index', [
            'user' => $user,
            'fakultas' => $fakultas,
            'departemen' => $departemen,
            'labData' => $labData,
            'alatData' => $alatData,
            'users' => $users,
        ]);
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
        dd($request->all());
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
        $user = Auth::user();
        $alatData = DB::table('alat')
            ->select("alat.*", "lab.lab")
            ->join('lab', 'alat.id_lab', 'lab.id_lab')
            ->whereNot('lab.status', 0)
            ->orderBy("alat.created_at", "desc")
            ->get();

        return view('superadmin.alat', [
            'alatData' => $alatData,
            'user' => $user,
        ]);
    }

    public function addAlat() {
        $user = Auth::user();
        $labList = Lab::all();

        return view('superadmin.alat.add-alat', [
            'user' => $user,
            'labList' => $labList,
        ]);
    }

    public function storeAlat(Request $request) {
        $validatedData = $request->validate([
            'id_lab' => 'required|integer',
            'nama_alat' => 'required|string|max:255',
            'spesifikasi' => 'required|string|max:255',
            'jumlah' => 'required|string',
            'kondisi_alat' => 'required|string',
            'status' => 'required|string',
        ], [
            'id_lab' => 'Lab masih kosong',
            'nama_alat' => 'Alat masih kosong',
            'spesifikasi' => 'Spesifikasi masih kosong',
            'jumlah' => 'Jumlah masih kosong',
            'kondisi_alat' => 'Jumlah masih kosong',
            'status' => 'Pilih Aktif atau Non-Aktif',
        ]);

        Alat::create([
            'id_lab' => $validatedData['id_lab'],
            'nama_alat' => $validatedData['nama_alat'],
            'spesifikasi' => $validatedData['spesifikasi'],
            'jumlah' => $validatedData['jumlah'],
            'kondisi_alat' => $validatedData['kondisi_alat'],
            'status' => $validatedData['status'],
        ]);
        return redirect('/alatSA')->with('success', 'Alat baru berhasil ditambahkan');
    }

    public function editAlat($id) {
        $user = Auth::user();
        $labList = Lab::all();
        $selectedAlat = Alat::find($id);

        return view('superadmin.alat.edit-alat', [
            'user' => $user,
            'labList' => $labList,
            'selectedAlat' => $selectedAlat,
        ]);
    }

    public function updateAlat(Request $request, $id) {
        $validatedData = $request->validate([
            'id_lab' => 'required|integer',
            'nama_alat' => 'required|string|max:255',
            'spesifikasi' => 'required|string|max:255',
            'jumlah' => 'required|string',
            'kondisi_alat' => 'required|string',
            'status' => 'required|string',
        ], [
            'id_lab' => 'Lab masih kosong',
            'nama_alat' => 'Alat masih kosong',
            'spesifikasi' => 'Spesifikasi masih kosong',
            'jumlah' => 'Jumlah masih kosong',
            'kondisi_alat' => 'Jumlah masih kosong',
            'status' => 'Pilih Aktif atau Non-Aktif',
        ]);

        $selectedAlat = Alat::find($id);
        $selectedAlat->id_lab = $validatedData['id_lab'];
        $selectedAlat->nama_alat = $validatedData['nama_alat'];
        $selectedAlat->spesifikasi = $validatedData['spesifikasi'];
        $selectedAlat->jumlah = $validatedData['jumlah'];
        $selectedAlat->kondisi_alat = $validatedData['kondisi_alat'];
        $selectedAlat->status = $validatedData['status'];
        $selectedAlat->save();

        return redirect('/alatSA')->with('success', 'Data alat berhasil diperbarui');
    }

    public function destroyAlat($id) {
        $selectedAlat = Alat::find($id);
        $selectedAlat->delete();
        return back()->with('success', 'Data alat berhasil dihapus');
    }

    public function user() {
        $user = Auth::user();
        $users = DB::table('users')
            ->select("*")
            ->orderBy("created_at", "desc")
            ->get();

        return view('superadmin.user', [
            'user' => $user,
            'users' => $users,
        ]);
    }

    public function addUser() {
        $user = Auth::user();
        $labList = Lab::whereNot("status", 0)->get();
        return view('superadmin.user.add-user', [
            'user' => $user,
            'labList' => $labList,
        ]);
    }

    public function storeUser(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255',
            'password' => 'required|string|max:255',
            'id_lab' => 'required|integer',
            'id_role' => 'required|string',
            'status' => 'required|string',
        ], [
            'name' => 'Nama user masih kosong',
            'email.required' => 'Email masih kosong',
            'email.email' => 'Format email salah',
            'password' => 'Password masih kosing',
            'id_lab' => 'Lab masih kosong',
            'id_role' => 'Role masih kosong',
            'status' => 'Pilih Aktif atau Non-Aktif',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'id_lab' => $validatedData['id_lab'],
            'id_role' => $validatedData['id_role'],
            'password' => bcrypt($validatedData['password']),
            'id_status' => $validatedData['status'],
        ]);
        return redirect('/userSA')->with('success', 'User baru berhasil dibuat');
    }

    public function editUser($id) {
        $user = Auth::user();
        $labList = Lab::whereNot("status", 0)->get();
        $selectedUser = User::find($id);

        return view('superadmin.user.edit-user', [
            'user' => $user,
            'labList' => $labList,
            'selectedUser' => $selectedUser,
        ]);
    }

    public function updateUser(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255',
            'password' => 'required|string|max:255',
            'id_lab' => 'required|integer',
            'id_role' => 'required|string',
            'status' => 'required|string',
        ], [
            'name' => 'Nama user masih kosong',
            'email.required' => 'Email masih kosong',
            'email.email' => 'Format email salah',
            'password' => 'Password masih kosing',
            'id_lab' => 'Lab masih kosong',
            'id_role' => 'Role masih kosong',
            'status' => 'Pilih Aktif atau Non-Aktif',
        ]);

        $selectedUser = User::find($id);
        $selectedUser->name = $validatedData['name'];
        $selectedUser->email = $validatedData['email'];
        $selectedUser->password = bcrypt($validatedData['password']);
        $selectedUser->id_lab = $validatedData['id_lab'];
        $selectedUser->id_role = $validatedData['id_role'];
        $selectedUser->id_status = $validatedData['status'];
        $selectedUser->save();

        return redirect('/userSA')->with('success', 'Data user berhasil diperbarui');
    }

    public function destroyUser($id) {
        $selectedUser = User::find($id);
        $selectedUser->delete();
        return back()->with('success', 'Data user berhasil dihapus');
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

    public function dosenSuperAdmin() {
        $user = Auth::user();
        $dosenList = DB::table('dosens')
            ->select('dosens.*', 'departemen.departemen')
            ->join('departemen', 'dosens.id_departemen', 'departemen.id_departemen')
            ->orderBy('dosens.created_at', 'desc')
            ->get();

        return view('superadmin.dosen.dosen', [
            'user' => $user,
            'dosenList' => $dosenList,
        ]);
    }

    public function addDosenSuperAdmin() {
        $user = Auth::user();
        $departemenList = Departemen::whereNot("status", 0)->get();

        return view('superadmin.dosen.add-dosen', [
            'user' => $user,
            'departemenList' => $departemenList,
        ]);
    }

    public function storeDosenSuperAdmin(Request $request) {
        $validatedData = $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'id_departemen' => 'required|integer',
        ], [
            'nama_dosen' => 'Nama dosen masih kosong',
            'id_departemen' => 'Departemen masih kosong',
        ]);
        Dosen::create([
            'nama_dosen' => $validatedData['nama_dosen'],
            'id_departemen' => $validatedData['id_departemen'],
        ]);
        return redirect('/dosenSA')->with('success', 'Dosen baru berhasil dibuat');
    }

    public function editDosenSuperAdmin($id) {
        $user = Auth::user();
        $selectedDosen = Dosen::find($id);
        $departemenList = Departemen::whereNot("status", 0)->get();

        return view('superadmin.dosen.edit-dosen', [
            'user' => $user,
            'selectedDosen' => $selectedDosen,
            'departemenList' => $departemenList,
        ]);
    }

    public function updateDosenSuperAdmin(Request $request, $id) {
        $validatedData = $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'id_departemen' => 'required|integer',
        ], [
            'nama_dosen' => 'Nama dosen masih kosong',
            'id_departemen' => 'Departemen masih kosong',
        ]);

        $selectedDosen = Dosen::find($id);
        $selectedDosen->nama_dosen = $validatedData['nama_dosen'];
        $selectedDosen->id_departemen = $validatedData['id_departemen'];
        $selectedDosen->save();

        return redirect('/dosenSA')->with('success', 'Data dosen berhasil diperbarui');
    }

    public function destroyDosenSuperAdmin($id) {
        $selectedDosen = Dosen::find($id);
        $selectedDosen->delete();
        return back()->with('success', 'Data dosen berhasil dihapus');
    }

    public function indexProfileSuperAdmin() {
        $user = Auth::user();
        return view('superadmin.profile.profile', [
            'user' => $user,
        ]);
    }

    public function updateProfileAdmin(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255',
            'photo' => 'mimes:png,jpg,jpeg|max:10000',
        ], [
            'name' => 'Nama user masih kosong',
            'email.required' => 'Email masih kosong',
            'email.email' => 'Format email salah',
        ]);

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            $fileName = date("d-m-Y") . $photo->getClientOriginalName();
            $filePath = 'photo-super-admin/' . $fileName;
            Storage::disk("public")->put($filePath, file_get_contents($photo));
        }

        $selectedUser = User::find($id);
        $selectedUser->name = $validatedData['name'];
        $selectedUser->email = $validatedData['email'];
        $selectedUser->id_departemen = null;
        if ($request->file('photo')) {
            $selectedUser->photo = $fileName;
        }
        $selectedUser->save();

        return back()->with('success', 'Data user berhasil diperbarui');
    }

    public function updateProfilePassAdmin(Request $request, $id) {
        $validatedData = $request->validate([
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string',
            'confirmPassword' => 'required|string',
        ], [
            'currentPassword' => 'Current password masih kosong',
            'newPassword' => 'New password masih kosong',
            'confirmPassword' => 'Confirm password masih kosong',
        ]);

        $selectedUser = User::find($id);
        $checkPassword = Hash::check($validatedData['currentPassword'], $selectedUser->password);
        if (!$checkPassword) {
            return back()->with('error', 'Current password tidak sesuai');
        }
        if ($validatedData['newPassword'] != $validatedData['confirmPassword']) {
            return back()->with('error', 'Confirm password tidak sesuai dengan new password');
        }

        $selectedUser->password = bcrypt($validatedData['confirmPassword']);
        $selectedUser->save();

        return back()->with('success', 'Password berhasil diperbarui');
    }
}