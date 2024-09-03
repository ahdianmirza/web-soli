<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getAlat(Request $request) {
        $alats = [];
        if ($search = $request->nama_alat) {
            // $alats = Alat::where("nama_alat", "LIKE", "%$search%")->get();
            $alats = Alat::all();
        }
        $alats = Alat::all();
        return response()->json($alats);
    }
}