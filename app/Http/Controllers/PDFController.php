<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller {
    public function viewTablePeminjaman() {
        $user = Auth::user();
        $idDepartemen = $user->id_departemen;
        $peminjamanList = DB::table('approval_peminjamen as approval')
            ->select('header.id as id_header', 'header.*', 'approval.id as approval_id', 'lab.id_departemen', 'users.name as user_name', 'lab.lab as lab_name', 'approval.created_at as approval_created_at', 'approval.status_approval', 'approval.result', 'approval.is_resolved')
            ->join('header_transaksis as header', 'approval.id_header', 'header.id')
            ->join('lab', 'header.id_lab', 'lab.id_lab')
            ->join('users', 'header.user_id', 'users.id')
            ->where('lab.id_departemen', $idDepartemen)
            ->where('header.is_deleted', null)
            ->orderBy('header.updated_at', 'desc')
            ->get();
        $detailList = DB::table("detail_transaksis as detail")
            ->select("detail.*", "alat.nama_alat")
            ->join("alat", "detail.id_alat", "alat.id_alat")
            ->get();

        return view('admin.pdf.peminjaman-all', [
            'title' => "Peminjaman All Data",
            'user' => $user,
            'peminjamanList' => $peminjamanList,
            'detailList' => $detailList,
        ]);
    }

    public function viewPeminjamanDownload(Request $request) {
        $user = Auth::user();
        $idDepartemen = $user->id_departemen;
        $dateNow = date('d M Y');

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
            $title = "Peminjaman Filter";
            $fileName = "data-peminjaman-filter-$dateNow.pdf";
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
            $title = "Peminjaman Filter";
            $fileName = "data-peminjaman-filter-$dateNow.pdf";
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
            $title = "Peminjaman Filter";
            $fileName = "data-peminjaman-filter-$dateNow.pdf";
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
            $title = "Peminjaman All Data";
            $fileName = "data-peminjaman-$dateNow.pdf";
        } else {
            return back()->with('error', 'Filter yang anda masukkan tidak bisa digunakan');
        }

        $detailList = DB::table("detail_transaksis as detail")
            ->select("detail.*", "alat.nama_alat")
            ->join("alat", "detail.id_alat", "alat.id_alat")
            ->get();
        $labList = Lab::all();
        $departmentList = Departemen::all();

        $mpdf = new \Mpdf\Mpdf();

        $html = view('admin.pdf.peminjaman-all', [
            'title' => $title,
            'user' => $user,
            'peminjamanList' => $peminjamanList,
            'detailList' => $detailList,
            'labList' => $labList,
            'departmentList' => $departmentList,
        ]);

        $mpdf->WriteHTML($html);
        // $mpdf->Output();
        $mpdf->Output($fileName, "D");
    }
}