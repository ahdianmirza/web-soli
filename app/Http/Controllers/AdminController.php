<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller {

    public function index() {
        $user = Auth::user();
        $jumlahForm = DB::table("header_transaksis as header")
            ->select("header.id")
            ->join("lab", "header.id_lab", "lab.id_lab")
            ->where("lab.id_lab", $user->id_lab)
            ->where("header.is_deleted", null)
            ->whereNot("header.status", null)
            ->count();

        $jumlahAlatDipinjam = DB::table("detail_transaksis as detail")
            ->select("detail.*")
            ->join("header_transaksis as header", "detail.id_header", "header.id")
            ->join("lab", "header.id_lab", "lab.id_lab")
            ->where("lab.id_lab", $user->id_lab)
            ->where("header.status", 2)
            ->orWhere("header.status", 3)
            ->where("header.is_deleted", null)
            ->sum("detail.qty_borrow");

        $peminjamanList = DB::table('approval_peminjamen as approval')
            ->select('header.id as id_header', 'header.*', 'approval.id as approval_id', 'lab.id_departemen', 'users.name as user_name', 'lab.lab as lab_name', 'approval.created_at as approval_created_at', 'approval.status_approval', 'approval.result', 'approval.is_resolved')
            ->join('header_transaksis as header', 'approval.id_header', 'header.id')
            ->join('lab', 'header.id_lab', 'lab.id_lab')
            ->join('users', 'header.user_id', 'users.id')
            ->where('lab.id_lab', $user->id_lab)
            ->where('header.is_deleted', null)
            ->orderBy('header.updated_at', 'desc')
            ->get();
        $peminjamanMenunggu = $peminjamanList->filter(function ($item) {
            return ($item->status_approval == 1 && $item->result == 'waiting') ||
                ($item->status_approval == 1 && $item->result == 'rejected' && $item->is_resolved == 1);
        })->count();
        $peminjamanSetuju = $peminjamanList->where("status_approval", 2)->where("result", "approve")->count();
        $peminjamanPengecekan = $peminjamanList->filter(function ($item) {
            return ($item->status_approval == 3 && $item->result == 'waiting') ||
                ($item->status_approval == 3 && $item->result == 'rejected' && $item->is_resolved == 1);
        })->count();
        $peminjamanSelesai = $peminjamanList->where("status_approval", 4)->where("result", "approve")->count();
        $peminjamanTolak = $peminjamanList->where("status_approval", "!=", null)->where("result", "rejected")->count();

        $belumKembali = DB::table("detail_transaksis as detail")
            ->select("detail.*", "lab.lab", "alat.nama_alat", "header.header_name", "header.tanggal_pinjam", "users.name as user_name")
            ->join("alat", "detail.id_alat", "alat.id_alat")
            ->join("header_transaksis as header", "detail.id_header", "header.id")
            ->join("approval_peminjamen as approval", "header.id", "approval.id_header")
            ->join("lab", "header.id_lab", "lab.id_lab")
            ->join("users", "header.user_id", "users.id")
            ->where('lab.id_lab', $user->id_lab)
            ->where('approval.status_approval', '>=', 2)
            ->where('approval.status_approval', '!=', 4)
            ->get();

        return view('admin.index', [
            'user' => $user,
            'belumKembali' => $belumKembali,
            'jumlahForm' => $jumlahForm,
            'jumlahAlatDipinjam' => $jumlahAlatDipinjam,
            'peminjamanMenunggu' => $peminjamanMenunggu,
            'peminjamanSetuju' => $peminjamanSetuju,
            'peminjamanPengecekan' => $peminjamanPengecekan,
            'peminjamanSelesai' => $peminjamanSelesai,
            'peminjamanTolak' => $peminjamanTolak,
        ]);
    }

    public function indexProfileAdmin() {
        $user = Auth::user();
        $selectedLab = Lab::find($user->id_lab);
        $departemenList = Departemen::all();
        $labList = Lab::all();
        return view('admin.profile.profile', [
            'user' => $user,
            'departemenList' => $departemenList,
            'labList' => $labList,
            'selectedLab' => $selectedLab,
        ]);
    }

    public function updateProfileAdmin(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|max:255',
            'id_lab' => 'required|integer',
            'photo' => 'mimes:png,jpg,jpeg|max:10000',
        ], [
            'name' => 'Nama user masih kosong',
            'email.required' => 'Email masih kosong',
            'email.email' => 'Format email salah',
            'id_lab' => 'Lab masih kosong',
        ]);

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            $fileName = date("d-m-Y") . $photo->getClientOriginalName();
            $filePath = 'photo-admin/' . $fileName;
            Storage::disk("public")->put($filePath, file_get_contents($photo));
        }

        $selectedUser = User::find($id);
        $selectedUser->name = $validatedData['name'];
        $selectedUser->email = $validatedData['email'];
        $selectedUser->id_lab = $validatedData['id_lab'];
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