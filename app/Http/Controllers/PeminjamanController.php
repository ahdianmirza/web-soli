<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\HeaderTransaksi;
use App\Models\Lab;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PDF;

class PeminjamanController extends Controller
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

        $peminjaman = $peminjaman->map(function ($item, $index) {
            $item->nomor = $index + 1;
            return $item;
        });
        return view('admin.peminjaman', compact('peminjaman', 'user'));
    }

    public function approve(Request $request, $id)
    {
        $request->validate([
            'approve' => 'required|integer'
        ]);

        $peminjaman = Transaksi::findOrFail($id);
        $peminjaman->approve = $request->input('approve');
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui!');
    }

    public function batal($id)
    {
        $peminjaman = Transaksi::find($id);

        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Peminjaman tidak ditemukan.');
        }

        $peminjaman->approve = 1; // Atau status lain yang Anda inginkan
        $peminjaman->save();

        return redirect()->back()->with('success', 'Peminjaman berhasil dibatalkan.');
    }

    public function indexHeader() {
        $user = Auth::user();
        $headerPeminjaman = DB::table("header_transaksis as header")
                            ->select("header.id", "header.header_name", "header.dosen", "header.tanggal_pinjam", "header.start_time", "header.end_time", "header.status", "lab.lab", "users.name as user_name")
                            ->join("lab", "header.id_lab", "=", "lab.id_lab")
                            ->join("users", "header.user_id", "=", "users.id")
                            ->where("header.is_deleted", null)
                            ->orderBy("header.created_at", "desc")
                            ->get();
        
        return view("user.header-peminjaman", [
            "user" => $user,
            "headerPeminjaman" => $headerPeminjaman
        ]);
    }

    public function addHeader() {
        $user = Auth::user();
        $labList = DB::table('lab')
            ->select('id_lab', 'lab', 'id_departemen')
            ->where('status', 1)
            ->get();
        $dosenList = DB::table('dosen')->get();
        
        return view("user.add-header-peminjaman", [
            "user" => $user,
            "labList" => $labList,
            "dosenList" => $dosenList
        ]);
    }

    public function storeHeader(Request $request) {
        $validatedData = $request->validate([
            "header_name" => 'required|string|max:255',
            "id_lab" => 'required|string',
            "dosen" => 'required|string',
            "tanggal_pinjam" => 'required|string',
            "start_time" => 'required|string',
            "end_time" => 'required|string',
            "email" => 'required|string',
            "user_id" => 'required|string',
        ]);

        HeaderTransaksi::create([
            'header_name' => $validatedData['header_name'],
            'id_lab' => $validatedData['id_lab'],
            'dosen' => $validatedData['dosen'],
            'tanggal_pinjam' => date("Y-m-d", strtotime($validatedData['tanggal_pinjam'])),
            'start_time' => date("H:i", strtotime($validatedData['start_time'])),
            'end_time' => date("H:i", strtotime($validatedData['end_time'])),
            'email' => $validatedData['email'],
            'user_id' => $validatedData['user_id'],
        ]);

        return redirect('/header-peminjamanUser')->with('success', 'Data header peminjaman berhasil ditambahkan.');
    }

    public function editHeader($id) {
        $user = Auth::user();
        $selectedHeader = HeaderTransaksi::find($id);
        $labList = DB::table('lab')
            ->select('id_lab', 'lab', 'id_departemen')
            ->where('status', 1)
            ->get();
        $dosenList = DB::table('dosen')->get();
        
        return view('user.edit-header-peminjaman', [
            "user" => $user,
            "labList" => $labList,
            "dosenList" => $dosenList,
            "selectedHeader" => $selectedHeader
        ]);
    }

    public function updateHeader(Request $request, $id) {
        $validatedData = $request->validate([
            "header_name" => 'required|string|max:255',
            "id_lab" => 'required|string',
            "dosen" => 'required|string',
            "tanggal_pinjam" => 'required|string',
            "start_time" => 'required|string',
            "end_time" => 'required|string',
            "email" => 'required|string',
            "user_id" => 'required|string',
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

        return redirect('/header-peminjamanUser')->with('success', 'Data header peminjaman berhasil diperbarui.');
    }

    public function deleteHeader($id) {
        $selectedHeader = HeaderTransaksi::find($id);
        $selectedHeader->is_deleted = 1;
        $selectedHeader->save();
        
        return redirect('/header-peminjamanUser')->with('success', 'Data header peminjaman berhasil dihapus.');
    }

    public function indexUser()
    {
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
    public function store(Request $request)
    {
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

    public function edit($id)
    {
        $peminjaman = Transaksi::find($id);
        if ($peminjaman) {
            return response()->json(['success' => true, 'peminjaman' => $peminjaman]);
        }
        return response()->json(['success' => false, 'message' => 'Data not found']);
    }


    public function update(Request $request, $id)
    {
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

    public function destroy($id)
    {
        $peminjaman = Transaksi::findOrFail($id);
        $peminjaman->delete();
        return redirect()->route('user.peminjaman.index')->with('success', 'Peminjaman berhasil dihapus.');
    }

    public function kembalikan($id)
    {
        $peminjaman = Transaksi::find($id);

        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Peminjaman tidak ditemukan.');
        }
        $peminjaman->approve = 3;
        $peminjaman->save();

        return redirect()->back()->with('success', 'Peminjaman telah selesai, menunggu pengecekan petugas.');
    }
    public function batalpengembalian($id)
    {
        $peminjaman = Transaksi::find($id);

        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Peminjaman tidak ditemukan.');
        }
        $peminjaman->approve = 2;
        $peminjaman->save();

        return redirect()->back()->with('success', 'status berhasil diganti');
    }

    public function downloadPDF($id)
    {
        $user = Auth::user();

        $peminjaman = Transaksi::with(['lab', 'alat'])->findOrFail($id);

        $pdf = PDF::loadView('user.pdf', compact('peminjaman', 'user'));

        return $pdf->download('peminjaman_' . $peminjaman->id . '.pdf');
    }
    public function downloadPDFAll()
    {
        $user = Auth::user();

        $peminjaman = Transaksi::with(['lab', 'alat'])
            ->get();

        $pdf = PDF::loadView('admin.pdfall', compact('peminjaman', 'user'));

        return $pdf->download('peminjaman.pdf');
    }
}