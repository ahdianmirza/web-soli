<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller {

    public function index() {
        $user = Auth::user();
        $idDepartemen = $user->id_departemen;
        $peminjaman = DB::table('transaksi as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')
            ->join('alat as t', 'a.id_alat', '=', 't.id_alat')
            ->where('d.id_departemen', $idDepartemen)
            ->get();

        $belumKembali = DB::table('transaksi as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')
            ->join('alat as t', 'a.id_alat', '=', 't.id_alat')
            ->where('d.id_departemen', $idDepartemen)
            ->whereIn('a.approve', [2, 3])
            ->whereDate('a.tanggal_pinjam', '<', Carbon::today())
            ->get();

        $menunggu = $peminjaman->where('approve', 1)->count();
        $setujui = $peminjaman->where('approve', 2)->count();
        $pengecekan = $peminjaman->where('approve', 3)->count();
        $selesai = $peminjaman->where('approve', 4)->count();
        $tolak = $peminjaman->where('approve', 5)->count();

        $jumlahPeminjam = $peminjaman->count();
        $jumlahAlatDipinjam = $peminjaman->where('approve', 2)->sum('jumlah_pinjam');
        $jumlahAlatSudahDikembalikan = $peminjaman->where('approve', 4)->sum('jumlah_pinjam');
        $today = Carbon::today();
        $jumlahAlatBelumDikembalikan = $belumKembali->sum('jumlah_pinjam');

        $peminjaman = $peminjaman->map(function ($item, $index) {
            $item->nomor = $index + 1;
            return $item;
        });

        $belumKembali = $belumKembali->map(function ($item, $index) {
            $item->nomor = $index + 1;
            return $item;
        });

        return view('admin.index', compact('peminjaman', 'user', 'jumlahPeminjam', 'jumlahAlatDipinjam', 'jumlahAlatSudahDikembalikan', 'jumlahAlatBelumDikembalikan',
            'menunggu', 'setujui', 'pengecekan', 'selesai', 'tolak', 'belumKembali'));
    }

    public function indexProfileAdmin() {
        $user = Auth::user();
        $selectedDepartemen = Departemen::find($user->id_departemen);
        $departemenList = Departemen::all();

        return view('admin.profile.profile', [
            'user' => $user,
            'selectedDepartemen' => $selectedDepartemen,
            'departemenList' => $departemenList,
        ]);
    }

    public function updateProfileAdmin(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255',
            'id_departemen' => 'required|integer',
            'photo' => 'mimes:png,jpg,jpeg|max:10000',
        ], [
            'name' => 'Nama user masih kosong',
            'email.required' => 'Email masih kosong',
            'email.email' => 'Format email salah',
            'id_departemen' => 'Departemen masih kosong',
        ]);

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            $fileName = date("d-m-Y") . $photo->getClientOriginalName();
            $filePath = 'photo-user/' . $fileName;
            Storage::disk("public")->put($filePath, file_get_contents($photo));
        }

        $selectedUser = User::find($id);
        $selectedUser->name = $validatedData['name'];
        $selectedUser->email = $validatedData['email'];
        $selectedUser->id_departemen = $validatedData['id_departemen'];
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