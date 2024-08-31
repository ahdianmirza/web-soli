<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartemenController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mengambil departemen berdasarkan id_fakultas dari user yang login
        $departemen = DB::table('departemen as d')
            ->join('fakultas as f', 'd.id_fakultas', '=', 'f.id_fakultas')
            ->where('d.id_fakultas', $user->id_fakultas) // Menyaring berdasarkan id_fakultas user yang login
            ->get();
        $departemen = $departemen->map(function ($item, $index) {
            $item->nomor = $index + 1; // Nomor urut mulai dari 1
            return $item;
        });
        $users = DB::table('users')->get(); // Jika kamu masih memerlukan data users

        return view('admin.departemen', compact('departemen', 'user'));
    }

    public function store(Request $request)
    {
        if (!$request->hasFile('img')) {
            return back()->with('error', 'File gambar tidak ditemukan.');
        }

        $validatedData = $request->validate([
            'id_fakultas' => 'required|exists:fakultas,id_fakultas',
            'departemen' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('img');
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $randomNumber = rand(100, 999);
        $newImageName = $imageName . $randomNumber . '.' . $image->getClientOriginalExtension();

        if (!$image->move(public_path('img/departemen'), $newImageName)) {
            return back()->with('error', 'Gagal menyimpan file gambar.');
        }

        Departemen::create([
            'id_fakultas' => $validatedData['id_fakultas'],
            'departemen' => $validatedData['departemen'],
            'img' => $newImageName,
            'id_status' => 1,
            'status' => 1,
        ]);
        // Redirect dengan pesan sukses
        return redirect('departemen')->with('success', 'Data departemen berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_fakultas' => 'required|exists:fakultas,id_fakultas',
            'departemen' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $departemen = Departemen::findOrFail($id);
        $departemen->id_fakultas = $validatedData['id_fakultas'];
        $departemen->departemen = $validatedData['departemen'];

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $randomNumber = rand(100, 999);
            $newImageName = $imageName . $randomNumber . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('img/departemen'), $newImageName);

            // Hapus gambar lama jika ada
            if ($departemen->img) {
                unlink(public_path('img/departemen/' . $departemen->img));
            }

            $departemen->img = $newImageName;
        }

        $departemen->save();

        return redirect('/departemen')->with('success', 'Data departemen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $departemen = Departemen::findOrFail($id);

        // Hapus gambar jika ada
        if ($departemen->img) {
            unlink(public_path('img/departemen/' . $departemen->img));
        }

        $departemen->delete();

        return redirect('/departemen')->with('success', 'Data departemen berhasil dihapus!');
    }
}
