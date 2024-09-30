<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\ApprovalPeminjaman;
use App\Models\DetailTransaksi;
use App\Models\HeaderTransaksi;
use App\Models\Lab;
use App\Models\LogApproval;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller {
    public function index() {
        $user = Auth::user();
        $idDepartemen = $user->id_departemen;
        $peminjaman = DB::table('transaksi as a')->join('lab as l', 'a.id_lab', '=', 'l.id_lab')->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')->join('alat as t', 'a.id_alat', '=', 't.id_alat')->where('d.id_departemen', $idDepartemen)->get();

        $peminjaman = $peminjaman->map(function ($item, $index) {
            $item->nomor = $index + 1;
            return $item;
        });
        return view('admin.peminjaman', compact('peminjaman', 'user'));
    }

    public function indexPeminjamanAdmin(Request $request) {
        $user = Auth::user();
        $idDepartemen = $user->id_departemen;

        if ($request['lab'] && $request['start_date'] == null && $request['end_date'] == null) {
            $peminjamanList = DB::table('approval_peminjamen as approval')
                ->select('header.id as id_header', 'header.*', 'approval.id as approval_id', 'lab.id_departemen', 'users.name as user_name', 'lab.lab as lab_name', 'approval.created_at as approval_created_at', 'approval.status_approval', 'approval.result', 'approval.is_resolved')
                ->join('header_transaksis as header', 'approval.id_header', 'header.id')
                ->join('lab', 'header.id_lab', 'lab.id_lab')
                ->join('users', 'header.user_id', 'users.id')
                ->where('lab.id_departemen', $idDepartemen)
                ->where('header.is_deleted', null)
                ->where('lab.id_lab', $request['lab'])
                ->orderBy('header.updated_at', 'desc')
                ->get();
        } else if ($request['lab'] == null && $request['start_date'] && $request['end_date']) {
            $peminjamanList = DB::table('approval_peminjamen as approval')
                ->select('header.id as id_header', 'header.*', 'approval.id as approval_id', 'lab.id_departemen', 'users.name as user_name', 'lab.lab as lab_name', 'approval.created_at as approval_created_at', 'approval.status_approval', 'approval.result', 'approval.is_resolved')
                ->join('header_transaksis as header', 'approval.id_header', 'header.id')
                ->join('lab', 'header.id_lab', 'lab.id_lab')
                ->join('users', 'header.user_id', 'users.id')
                ->where('lab.id_departemen', $idDepartemen)
                ->where('header.is_deleted', null)
                ->whereBetween('header.tanggal_pinjam', [date('Y-m-d 00:00:00', strtotime($request['start_date'])), date('Y-m-d 23:59:59', strtotime($request['end_date']))])
                ->orderBy('header.updated_at', 'desc')
                ->get();
        } else if ($request['lab'] && $request['start_date'] && $request['end_date']) {
            $peminjamanList = DB::table('approval_peminjamen as approval')
                ->select('header.id as id_header', 'header.*', 'approval.id as approval_id', 'lab.id_departemen', 'users.name as user_name', 'lab.lab as lab_name', 'approval.created_at as approval_created_at', 'approval.status_approval', 'approval.result', 'approval.is_resolved')
                ->join('header_transaksis as header', 'approval.id_header', 'header.id')
                ->join('lab', 'header.id_lab', 'lab.id_lab')
                ->join('users', 'header.user_id', 'users.id')
                ->where('lab.id_departemen', $idDepartemen)
                ->where('header.is_deleted', null)
                ->where('lab.id_lab', $request['lab'])
                ->whereBetween('header.tanggal_pinjam', [date('Y-m-d 00:00:00', strtotime($request['start_date'])), date('Y-m-d 23:59:59', strtotime($request['end_date']))])
                ->orderBy('header.updated_at', 'desc')
                ->get();
        } else if ($request['lab'] == null && $request['start_date'] == null && $request['end_date'] == null) {
            $peminjamanList = DB::table('approval_peminjamen as approval')
                ->select('header.id as id_header', 'header.*', 'approval.id as approval_id', 'lab.id_departemen', 'users.name as user_name', 'lab.lab as lab_name', 'approval.created_at as approval_created_at', 'approval.status_approval', 'approval.result', 'approval.is_resolved')
                ->join('header_transaksis as header', 'approval.id_header', 'header.id')
                ->join('lab', 'header.id_lab', 'lab.id_lab')
                ->join('users', 'header.user_id', 'users.id')
                ->where('lab.id_departemen', $idDepartemen)
                ->where('header.is_deleted', null)
                ->orderBy('header.updated_at', 'desc')
                ->get();
        } else {
            return back()->with('error', 'Filter yang anda masukkan tidak bisa digunakan');
        }

        $labList = Lab::where("id_departemen", $idDepartemen)->get();

        return view('admin.peminjaman', [
            'user' => $user,
            'peminjamanList' => $peminjamanList,
            'labList' => $labList,
        ]);
    }

    public function indexDetailPeminjamanAdmin($id) {
        $user = Auth::user();
        $selectedApprovalPeminjaman = ApprovalPeminjaman::find($id);
        $selectedLog = LogApproval::where("id_approval", $id)
            ->orderBy("created_at", "desc")
            ->first();

        $selectedHeader = DB::table('header_transaksis as header')
            ->select('header.*', 'users.name as user_name', 'lab.lab as lab_name')
            ->join('users', 'header.user_id', '=', 'users.id')
            ->join('lab', 'header.id_lab', '=', 'lab.id_lab')
            ->where('header.id', $selectedApprovalPeminjaman->id_header)
            ->where('header.is_deleted', null)
            ->first();
        $detailList = DB::table('detail_transaksis as detail')
            ->select('detail.id', 'detail.id_alat', 'alat.nama_alat', 'alat.spesifikasi', 'detail.qty_borrow as jumlah', 'alat.kondisi_alat')
            ->join('alat', 'detail.id_alat', '=', 'alat.id_alat')
            ->where('detail.id_header', $selectedApprovalPeminjaman->id_header)
            ->where('is_deleted', null)
            ->get();

        return view('admin.detail-peminjaman-approval.detail-peminjaman-approval', [
            'user' => $user,
            'selectedHeader' => $selectedHeader,
            'detailList' => $detailList,
            'selectedApprovalPeminjaman' => $selectedApprovalPeminjaman,
            'selectedLog' => $selectedLog,
        ]);
    }

    public function peminjamanApproval(Request $request, $id) {
        $user = Auth::user();
        $selectedHeader = HeaderTransaksi::find($id);
        $headerTransaksi = DB::table('header_transaksis as header')->select('header.*', 'lab.id_departemen')->join('lab', 'header.id_lab', 'lab.id_lab')->where('header.id', $id)->first();

        $selectedDetailCount = DetailTransaksi::where('id_header', $id)->where('is_deleted', null)->get()->count();

        if ($selectedDetailCount === 0) {
            return back()->with('error', 'Belum terdapat detail peminjaman');
        }

        if ($request->status == 1) {
            ApprovalPeminjaman::create([
                'id_header' => $id,
                'id_departemen' => $headerTransaksi->id_departemen,
                'status_approval' => $request->status,
                'result' => $request->result,
                'created_by' => $user->id,
            ]);

            $selectedHeader->status = $request->status;
            $selectedHeader->save();

            $createdApprovalPeminjaman = ApprovalPeminjaman::where("id_header", $id)->first();
            LogApproval::create([
                'id_approval' => $createdApprovalPeminjaman->id,
                'status_log' => $request->status,
                'result' => $request->result,
                'created_by' => $user->id,
            ]);
        }
        return back()->with('success', 'Pengiriman peminjaman berhasil');
    }

    public function perbaikanPeminjaman(Request $request, $id) {
        $user = Auth::user();
        $validatedData = $request->validate([
            'note_resolved' => 'required|string|max:255',
        ], [
            'note_resolved' => "Note perbaikan masih kosong",
        ]);

        $selectedApprovalPeminjaman = ApprovalPeminjaman::find($id);
        $selectedHeader = HeaderTransaksi::find($selectedApprovalPeminjaman->id_header);
        $selectedLog = LogApproval::where("id_approval", $id)->orderBy("created_at", "desc")->first();

        $selectedHeader->is_resolved = 1;
        $selectedHeader->is_rejected = null;
        $selectedHeader->save();

        $selectedApprovalPeminjaman->is_resolved = 1;
        $selectedApprovalPeminjaman->save();

        LogApproval::create([
            'id_approval' => $id,
            'status_log' => $request->status == 1 ? 1 : 3,
            'result' => "rejected",
            'note' => $selectedLog->note,
            'note_resolved' => $validatedData['note_resolved'],
            'created_by' => $user->id,
        ]);

        return back()->with('success', $request->status == 1 ? "Perbaikan peminjaman berhasil dikirim" : "Perbaikan pengembalian berhasil dikirim");
    }

    public function peminjamanApprovalAdmin(Request $request, $id) {
        $user = Auth::user();
        $validatedData = $request->validate([
            'note' => 'required|string|max:255',
            'result' => 'required|string',
        ], [
            'note' => 'Note masih kosong',
            'result' => 'Pilih setuju atau tolak',
        ]);

        $selectedApprovalPeminjaman = ApprovalPeminjaman::find($id);
        $selectedHeader = HeaderTransaksi::find($selectedApprovalPeminjaman->id_header);
        $detailPeminjamanList = DetailTransaksi::where('id_header', $selectedApprovalPeminjaman->id_header)
            ->where("is_deleted", null)
            ->get();
        $cekAlat = [];
        $namaAlat = [];

        if ($request->status != 1) {
            if ($validatedData['result'] == 'rejected') {
                $selectedHeader->is_rejected = 1;
                $selectedHeader->is_resolved = null;
                $selectedHeader->save();

                $selectedApprovalPeminjaman->result = $validatedData['result'];
                $selectedApprovalPeminjaman->is_resolved = null;
                $selectedApprovalPeminjaman->save();

                LogApproval::create([
                    'id_approval' => $id,
                    'status_log' => 1,
                    'result' => $validatedData['result'],
                    'note' => $validatedData['note'],
                    'created_by' => $user->id,
                ]);

                return redirect('/peminjaman-approval')->with('success', 'Persetujuan peminjaman berhasil dikirim');
            } else if ($validatedData['result'] == 'approve') {
                foreach ($detailPeminjamanList as $detail) {
                    $selectedAlat = Alat::find($detail->id_alat);
                    if ($selectedAlat->qty_borrow + $detail->qty_borrow > $selectedAlat->jumlah) {
                        array_push($cekAlat, false);
                        array_push($namaAlat, $selectedAlat->nama_alat);
                        continue;
                    }
                    array_push($cekAlat, true);
                }
                $listAlat = implode(', ', $namaAlat);

                if (in_array(false, $cekAlat)) {
                    return back()->with('error', "Jumlah barang $listAlat yang tersedia tidak cukup");
                } else {
                    foreach ($detailPeminjamanList as $detail) {
                        $selectedAlat = Alat::find($detail->id_alat);
                        $selectedAlat->qty_borrow += $detail->qty_borrow;
                        $selectedAlat->save();
                    }

                    $selectedApprovalPeminjaman->status_approval = $request->status;
                    $selectedApprovalPeminjaman->result = $validatedData['result'];
                    $selectedApprovalPeminjaman->save();

                    LogApproval::create([
                        'id_approval' => $id,
                        'status_log' => $request->status,
                        'result' => $validatedData['result'],
                        'note' => $validatedData['note'],
                        'created_by' => $user->id,
                    ]);

                    $selectedHeader->status = $request->status;
                    $selectedHeader->is_rejected = null;
                    $selectedHeader->save();

                    return redirect('/peminjaman-approval')->with('success', 'Persetujuan peminjaman berhasil dikirim');
                }
            }
        }
    }

    public function pengembalianApproval(Request $request, $id) {
        $user = Auth::user();
        $selectedHeader = HeaderTransaksi::find($id);
        $headerTransaksi = DB::table('header_transaksis as header')->select('header.*', 'lab.id_departemen')->join('lab', 'header.id_lab', 'lab.id_lab')->where('header.id', $id)->first();

        if ($request->status == 3) {
            $selectedApprovalPeminjaman = ApprovalPeminjaman::where("id_header", $id)->first();

            $selectedApprovalPeminjaman->status_approval = $request->status;
            $selectedApprovalPeminjaman->result = $request->result;
            $selectedApprovalPeminjaman->is_resolved = null;
            $selectedApprovalPeminjaman->save();

            $selectedHeader->status = $request->status;
            $selectedHeader->is_resolved = null;
            $selectedHeader->save();

            LogApproval::create([
                'id_approval' => $selectedApprovalPeminjaman->id,
                'status_log' => $request->status,
                'result' => $request->result,
                'created_by' => $user->id,
            ]);
        }
        return back()->with('success', 'Pengembalian peminjaman berhasil dikirim');
    }

    public function indexPengembalianAdmin() {
        $user = Auth::user();
        $idDepartemen = $user->id_departemen;
        $pengembalianList = DB::table('approval_peminjamen as approval')
            ->select('header.id as id_header', 'header.*', 'approval.id as approval_id', 'lab.id_departemen', 'users.name as user_name', 'lab.lab as lab_name', 'approval.created_at as approval_created_at', 'approval.status_approval', 'approval.result')
            ->join('header_transaksis as header', 'approval.id_header', 'header.id')
            ->join('lab', 'header.id_lab', 'lab.id_lab')
            ->join('users', 'header.user_id', 'users.id')
            ->where('lab.id_departemen', $idDepartemen)
            ->where('header.is_deleted', null)
            ->where('approval.status_approval', ">", 2)
            ->orderBy('header.updated_at', 'desc')
            ->get();

        return view('admin.pengembalian.pengembalian-approval', [
            'user' => $user,
            'pengembalianList' => $pengembalianList,
        ]);
    }

    public function indexDetailPengembalianAdmin($id) {
        $user = Auth::user();
        $selectedApprovalPengembalian = ApprovalPeminjaman::find($id);
        $selectedHeader = DB::table('header_transaksis as header')
            ->select('header.*', 'users.name as user_name', 'lab.lab as lab_name')
            ->join('users', 'header.user_id', '=', 'users.id')
            ->join('lab', 'header.id_lab', '=', 'lab.id_lab')
            ->where('header.id', $selectedApprovalPengembalian->id_header)
            ->where('header.is_deleted', null)
            ->first();
        $detailList = DB::table('detail_transaksis as detail')
            ->select('detail.id', 'detail.id_alat', 'alat.nama_alat', 'alat.spesifikasi', 'detail.qty_borrow as jumlah', 'alat.kondisi_alat')
            ->join('alat', 'detail.id_alat', '=', 'alat.id_alat')
            ->where('detail.id_header', $selectedApprovalPengembalian->id_header)
            ->where('is_deleted', null)
            ->get();

        return view('admin.pengembalian.detail-pengembalian-approval', [
            'user' => $user,
            'selectedHeader' => $selectedHeader,
            'detailList' => $detailList,
            'selectedApprovalPengembalian' => $selectedApprovalPengembalian,
        ]);
    }

    public function pengembalianApprovalAdmin(Request $request, $id) {
        $user = Auth::user();
        $validatedData = $request->validate([
            'note' => 'required|string|max:255',
            'result' => 'required|string',
        ], [
            'note' => 'Note masih kosong',
            'result' => 'Pilih setuju atau tolak',
        ]);

        $selectedApprovalPengembalian = ApprovalPeminjaman::find($id);
        $selectedHeader = HeaderTransaksi::find($selectedApprovalPengembalian->id_header);
        $detailPengembalianList = DetailTransaksi::where('id_header', $selectedApprovalPengembalian->id_header)
            ->where("is_deleted", null)
            ->get();

        if ($request->status == 4) {
            if ($validatedData['result'] == "approve") {
                foreach ($detailPengembalianList as $detail) {
                    $selectedAlat = Alat::find($detail->id_alat);
                    $selectedAlat->qty_borrow -= $detail->qty_borrow;
                    if ($selectedAlat->qty_borrow == 0) {
                        $selectedAlat->qty_borrow = null;
                    }
                    $selectedAlat->save();
                }

                $selectedApprovalPengembalian->status_approval = $request->status;
                $selectedApprovalPengembalian->result = $validatedData['result'];
                $selectedApprovalPengembalian->save();

                LogApproval::create([
                    'id_approval' => $id,
                    'status_log' => $request->status,
                    'result' => $validatedData['result'],
                    'note' => $validatedData['note'],
                    'created_by' => $user->id,
                ]);

                $selectedHeader->status = $request->status;
                $selectedHeader->is_rejected = null;
                $selectedHeader->save();

                return redirect('/peminjaman-approval')->with('success', 'Persetujuan pengembalian berhasil dikirim');
            } else if ($validatedData['result'] == "rejected") {
                $selectedHeader->is_rejected = 1;
                $selectedHeader->is_resolved = null;
                $selectedHeader->save();

                $selectedApprovalPengembalian->result = $validatedData['result'];
                $selectedApprovalPengembalian->is_resolved = null;
                $selectedApprovalPengembalian->save();

                LogApproval::create([
                    'id_approval' => $id,
                    'status_log' => 3,
                    'result' => $validatedData['result'],
                    'note' => $validatedData['note'],
                    'created_by' => $user->id,
                ]);

                return redirect('/peminjaman-approval')->with('success', 'Persetujuan pengembalian berhasil dikirim');
            }
        }
    }

    public function indexHeader() {
        $user = Auth::user();
        $headerPeminjaman = DB::table('header_transaksis as header')
            ->select('header.id', 'header.header_name', 'header.dosen', 'header.tanggal_pinjam', 'header.start_time', 'header.end_time', 'header.status', 'header.is_rejected', 'header.is_resolved', 'header.created_at as header_created_at', 'lab.lab', 'users.name as user_name')
            ->join('lab', 'header.id_lab', '=', 'lab.id_lab')
            ->join('users', 'header.user_id', '=', 'users.id')
            ->where('header.is_deleted', null)
            ->where('header.user_id', $user->id)
            ->orderBy('header.updated_at', 'desc')
            ->get();
        $peminjamanHistory = DB::table('approval_peminjamen as approval')
            ->select('approval.*', 'users.id as user_id', 'users.name as user_name')
            ->join('users', 'approval.id_departemen', 'users.id_departemen')
            ->get();

        $pengembalianHistory = DB::table('approval_peminjamen as approval')
            ->select('approval.*', 'users.id as user_id', 'users.name as user_name')
            ->join('users', 'approval.id_departemen', 'users.id_departemen')
            ->where('approval.status_approval', 3)
            ->get();

        $logApproval = DB::table('log_approvals as log')
            ->select("log.*", "users.name as user_name", "user_dept.name as user_dept_name")
            ->join("users", "log.created_by", "users.id")
            ->join("approval_peminjamen as approval", "log.id_approval", "approval.id")
            ->join("users as user_dept", "approval.id_departemen", "user_dept.id_departemen")
            ->get();

        return view('user.header-peminjaman', [
            'user' => $user,
            'headerPeminjaman' => $headerPeminjaman,
            'peminjamanHistory' => $peminjamanHistory,
            'pengembalianHistory' => $pengembalianHistory,
            'logApproval' => $logApproval,
        ]);
    }

    public function addHeader() {
        $user = Auth::user();
        $labList = DB::table('lab')->select('id_lab', 'lab', 'id_departemen')->where('status', 1)->get();
        $dosenList = DB::table('dosens')->get();

        return view('user.add-header-peminjaman', [
            'user' => $user,
            'labList' => $labList,
            'dosenList' => $dosenList,
        ]);
    }

    public function storeHeader(Request $request) {
        $validatedData = $request->validate([
            'header_name' => 'required|string|max:255',
            'id_lab' => 'required|string',
            'dosen' => 'required|string',
            'tanggal_pinjam' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'email' => 'required|string',
            'user_id' => 'required|string',
        ]);

        HeaderTransaksi::create([
            'header_name' => $validatedData['header_name'],
            'id_lab' => $validatedData['id_lab'],
            'dosen' => $validatedData['dosen'],
            'tanggal_pinjam' => date('Y-m-d', strtotime($validatedData['tanggal_pinjam'])),
            'start_time' => date('H:i', strtotime($validatedData['start_time'])),
            'end_time' => date('H:i', strtotime($validatedData['end_time'])),
            'email' => $validatedData['email'],
            'user_id' => $validatedData['user_id'],
        ]);

        return redirect('/header-peminjamanUser')->with('success', 'Data formulir peminjaman berhasil ditambahkan.');
    }

    public function editHeader($id) {
        $user = Auth::user();
        $selectedHeader = HeaderTransaksi::find($id);
        $labList = DB::table('lab')->select('id_lab', 'lab', 'id_departemen')->where('status', 1)->get();
        $dosenList = DB::table('dosens')->get();

        return view('user.edit-header-peminjaman', [
            'user' => $user,
            'labList' => $labList,
            'dosenList' => $dosenList,
            'selectedHeader' => $selectedHeader,
        ]);
    }

    public function updateHeader(Request $request, $id) {
        $validatedData = $request->validate([
            'header_name' => 'required|string|max:255',
            'id_lab' => 'required|string',
            'dosen' => 'required|string',
            'tanggal_pinjam' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'email' => 'required|string',
            'user_id' => 'required|string',
        ]);

        $selectedHeader = HeaderTransaksi::find($id);
        $selectedHeader->header_name = $validatedData['header_name'];
        $selectedHeader->id_lab = $validatedData['id_lab'];
        $selectedHeader->dosen = $validatedData['dosen'];
        $selectedHeader->tanggal_pinjam = $validatedData['tanggal_pinjam'];
        $selectedHeader->start_time = $validatedData['start_time'];
        $selectedHeader->end_time = $validatedData['end_time'];
        $selectedHeader->email = $validatedData['email'];
        $selectedHeader->user_id = $validatedData['user_id'];
        $selectedHeader->save();

        return redirect('/header-peminjamanUser')->with('success', 'Data formulir peminjaman berhasil diperbarui.');
    }

    public function deleteHeader($id) {
        $selectedHeader = HeaderTransaksi::find($id);
        $selectedDetail = DetailTransaksi::where('id_header', $id)->get();

        foreach ($selectedDetail as $detail) {
            $detail->is_deleted = 1;
            $selectedAlat = Alat::where('id_alat', $detail->id_alat)->first();
            $selectedAlat->qty_borrow -= $detail->qty_borrow;

            if ($selectedAlat->qty_borrow === 0) {
                $selectedAlat->qty_borrow = null;
            }

            $detail->save();
            $selectedAlat->save();
        }
        $selectedHeader->is_deleted = 1;
        $selectedHeader->save();

        return redirect('/header-peminjamanUser')->with('success', 'Data formulir peminjaman berhasil dihapus.');
    }

    public function indexDetail($id) {
        $user = Auth::user();
        $selectedHeader = DB::table('header_transaksis as header')->select('header.*', 'users.name as user_name', 'lab.lab as lab_name')->join('users', 'header.user_id', '=', 'users.id')->join('lab', 'header.id_lab', '=', 'lab.id_lab')->where('header.id', $id)->get();

        $detailList = DB::table('detail_transaksis as detail')->select('detail.id', 'detail.id_header', 'detail.id_alat', 'detail.qty_borrow as detail_qty_borrow', 'detail.is_deleted as detail_is_deleted', 'detail.created_at as detail_created_at', 'detail.updated_at as detail_updated_at', 'alat.nama_alat as nama_alat', 'alat.kondisi_alat', 'alat.spesifikasi')->join('alat', 'detail.id_alat', '=', 'alat.id_alat')->where('detail.is_deleted', null)->where('id_header', $id)->get();

        $rejectedPeminjaman = DB::table('approval_peminjamen as approval')->select('approval.*')->where('approval.id_header', $id)->where('approval.result', 'rejected')->where('approval.is_resolved', null)->first();

        $selectedLog = null;
        if (isset($rejectedPeminjaman)) {
            $selectedLog = LogApproval::where("id_approval", $rejectedPeminjaman->id)
                ->orderBy("created_at", "desc")
                ->first();
        }

        return view('user.detail-peminjaman.detail-peminjaman', [
            'user' => $user,
            'selectedHeader' => $selectedHeader,
            'detailList' => $detailList,
            'rejectedPeminjaman' => $rejectedPeminjaman,
            'selectedLog' => $selectedLog,
        ]);
    }

    public function addDetail($id) {
        $user = Auth::user();
        $selectedHeader = HeaderTransaksi::find($id);
        $alatList = Alat::where('id_lab', $selectedHeader->id_lab)
            ->whereRaw('jumlah - COALESCE(qty_borrow, 0) != 0')
            ->where('status', 1)
            ->get();

        return view('user.detail-peminjaman.add-detail-peminjaman', [
            'user' => $user,
            'alatList' => $alatList,
            'id_selectedHeader' => $selectedHeader->id,
        ]);
    }

    public function storeDetail(Request $request, $id) {
        $validatedData = $request->validate([
            'id_alat' => 'required|integer',
            'qty_borrow' => 'required|integer',
        ]);
        $selectedAlat = Alat::find($validatedData['id_alat']);
        $duplicateAlat = DetailTransaksi::where('id_alat', $validatedData['id_alat'])
            ->where('id_header', $id)
            ->first();

        if ($duplicateAlat) {
            return back()->with('error', 'Alat yang Anda pilih sudah tersimpan');
        }

        if ($selectedAlat->jumlah < $validatedData['qty_borrow']) {
            return back()->with('error', 'Jumlah alat yang dipinjam melebihi kesediaan alat.');
        }

        DetailTransaksi::create([
            'id_header' => $id,
            'id_alat' => $validatedData['id_alat'],
            'qty_borrow' => $validatedData['qty_borrow'],
        ]);

        return redirect("/detail-peminjamanUser/$id")->with('success', 'Data detail peminjaman berhasil ditambahkan.');
    }

    public function editDetail($id) {
        $user = Auth::user();
        $selectedDetail = DetailTransaksi::find($id);
        $selectedHeader = HeaderTransaksi::select('id_lab')
            ->where('id', $selectedDetail->id_header)
            ->get();
        $selectedAlat = Alat::where('id_alat', $selectedDetail->id_alat)->first();
        $alatList = Alat::where('id_lab', $selectedHeader[0]->id_lab)
            ->whereRaw('jumlah - COALESCE(qty_borrow, 0) != 0')
            ->where('status', 1)
            ->get();

        $exist = $alatList->contains(function ($alat) use ($selectedAlat) {
            return $alat->id_alat === $selectedAlat->id_alat;
        });

        if (!$exist) {
            $alatList->prepend($selectedAlat);
        }

        return view('user.detail-peminjaman.edit-detail-peminjaman', [
            'user' => $user,
            'alatList' => $alatList,
            'selectedDetail' => $selectedDetail,
        ]);
    }

    public function updateDetail(Request $request, $id) {
        $validatedData = $request->validate([
            'id_alat' => 'required|integer',
            'qty_borrow' => 'required|integer',
        ]);

        $selectedAlat = Alat::find($validatedData['id_alat']);
        $selectedDetail = DetailTransaksi::find($id);

        if ($selectedAlat->jumlah < $validatedData['qty_borrow']) {
            return redirect("/detail-peminjamanUser/$id/edit")->with('error', 'Jumlah alat yang dipinjam melebihi kesediaan alat.');
        }

        $selectedDetail->id_alat = $validatedData['id_alat'];
        $selectedDetail->qty_borrow = $validatedData['qty_borrow'];
        $selectedDetail->save();

        return redirect("/detail-peminjamanUser/$selectedDetail->id_header")->with('success', 'Data detail peminjaman berhasil ditambahkan.');
    }

    public function deleteDetail($id) {
        $selectedDetail = DetailTransaksi::find($id);
        $selectedDetail->is_deleted = 1;
        $selectedDetail->save();
        return back()->with('success', 'Data detail peminjaman berhasil dihapus.');
    }

    public function indexUser() {
        $user = Auth::user();
        $peminjaman = DB::table('transaksi as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')
            ->join('fakultas as f', 'd.id_fakultas', '=', 'f.id_fakultas')
            ->join('alat as t', 'a.id_alat', '=', 't.id_alat')
            ->where('a.email', $user->email) // Menambahkan kondisi untuk email pengguna
            ->get();

        // Menambahkan nomor urut pada setiap item
        $peminjaman = $peminjaman->map(function ($item, $index) {
            $item->nomor = $index + 1;
            return $item;
        });

        // Mengambil data untuk dropdown
        $labs = DB::table('lab')->get(); // Ambil data lab
        $alats = DB::table('alat')->get(); // Ambil data alat

        return view('user.peminjaman', compact('peminjaman', 'user', 'labs', 'alats'));
    }
    public function store(Request $request) {
        dd($request->all());
        try {
            $validatedData = $request->validate([
                'id_lab' => 'required|exists:lab,id_lab',
                'dosen' => 'required|string',
                'id_alat' => 'required|integer',
                'jumlah_pinjam' => 'required|integer',
                'tanggal_pinjam' => 'required|date',
                'waktu' => 'required|integer|between:1,8',
                'email' => 'nullable|email',
            ]);

            // Pengecekan apakah sudah ada peminjaman dengan id_lab dan waktu yang sama
            $existingPeminjaman = Transaksi::where('id_lab', $request->id_lab)
                ->where('tanggal_pinjam', $request->tanggal_pinjam)
                ->where('waktu', $request->waktu)
                ->exists();

            if ($existingPeminjaman) {
                return redirect()->back()->withErrors('Maaf, sudah ada peminjaman di lab ini pada waktu yang dipilih.');
            }

            // Pengecekan jumlah alat yang tersedia
            $alat = Alat::find($request->id_alat);

            if (!$alat || $request->jumlah_pinjam > $alat->jumlah) {
                return redirect()->back()->withErrors('Jumlah alat tidak mencukupi untuk peminjaman.');
            }

            // Simpan data peminjaman baru
            $peminjaman = new Transaksi();
            $peminjaman->user_id = Auth::id();
            $peminjaman->id_lab = $request->id_lab;
            $peminjaman->dosen = $request->dosen;
            $peminjaman->id_alat = $request->id_alat;
            $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
            $peminjaman->kondisi = 'Baik';
            $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
            $peminjaman->waktu = $request->waktu;
            $peminjaman->email = $request->email;
            $peminjaman->approve = 1;
            $peminjaman->save();

            // Kurangi jumlah alat di tabel alat
            $alat->jumlah -= $request->jumlah_pinjam;
            $alat->save();

            return redirect()->route('user.peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Gagal menyimpan data.');
        }
    }

    public function edit($id) {
        $peminjaman = Transaksi::find($id);
        if ($peminjaman) {
            return response()->json(['success' => true, 'peminjaman' => $peminjaman]);
        }
        return response()->json(['success' => false, 'message' => 'Data not found']);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'id_lab' => 'required|exists:lab,id_lab',
            'id_alat' => 'exists:alat,id_alat',
            'dosen' => 'required|string',
            'jumlah_pinjam' => 'required|integer',
            'tanggal_pinjam' => 'required|date',
            'waktu' => 'required|integer|between:1,8',
        ]);

        $peminjaman = Transaksi::findOrFail($id);
        $peminjaman->id_lab = $request->id_lab;
        $peminjaman->id_alat = $request->id_alat;
        $peminjaman->dosen = $request->dosen;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->waktu = $request->waktu;
        $peminjaman->save();

        return redirect('peminjamanUser')->with('success', 'Peminjaman berhasil diupdate.');
    }

    public function destroy($id) {
        $peminjaman = Transaksi::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('user.peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }

    public function kembalikan($id) {
        $peminjaman = Transaksi::find($id);

        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Peminjaman tidak ditemukan.');
        }
        $peminjaman->approve = 3;
        $peminjaman->save();

        return redirect()->back()->with('success', 'Peminjaman telah selesai, menunggu pengecekan petugas.');
    }
    public function batalpengembalian($id) {
        $peminjaman = Transaksi::find($id);

        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Peminjaman tidak ditemukan.');
        }
        $peminjaman->approve = 2;
        $peminjaman->save();

        return redirect()->back()->with('success', 'status berhasil diganti');
    }
}