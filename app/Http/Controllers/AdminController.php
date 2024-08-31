<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class AdminController extends Controller
{

    public function index()
    {
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
    
}
