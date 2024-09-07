<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function getFakultas()
    {
        $user = DB::table('user');
    }

    public function showFakultas()
    {
        return view('fakultas.fakultas');
    }

    public function showFaperta()
    {
        return view('fakultas.faperta.faperta');
    }


    public function showUserData()
    {
        $userData = DB::table('user as u')
            ->join('role as r', 'u.id_role', '=', 'r.id')
            ->select('u.id', 'u.nama', 'u.email', 'u.password', 'r.role', 'u.id_status', 'u.status')
            ->where('u.status', 1)
            ->get();
        return view('admin.masterUser', compact('userData'));
    }

    public function showLabData()
    {
        $labData = DB::table('lab as l')
            ->join('departemen as d', 'l.id_departemen', '=', 'd.id_departemen')
            ->select('l.id_lab', 'l.lab', 'd.departemen', 'l.id_status', 'l.status')
            ->where('l.status', 1)
            ->paginate(20);

        return view('admin.masterLab', compact('labData'));
    }

    public function showAlatData()
    {
        $alatData = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->select('a.id', 'a.nama_alat', 'a.spesifikasi', 'a.jumlah', 'a.kondisi_alat', 'l.lab', 'a.id_status', 'a.status')
            ->where('a.status', 1)
            ->get();

        return view('admin.masterAlat', compact('alatData'));
    }

    public function showAgro()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('a.status', 1)
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabDikHolti()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 2)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabKuljar2()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 3)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabSeed()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 4)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabUjibenih()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 5)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabBiofisikBenih()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 6)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabFisioBenih()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 7)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabMikroteknik()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 8)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabEkofisiTanaman()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 9)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabPascapanen()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 10)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabPmb1()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 11)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabPmb2()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 12)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabBenihbasah()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 13)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabBenihKering()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 14)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabTanamPerkebunan()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 15)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showLabEkotoksi()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 1)
            ->where('l.id_lab', 18)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.agro', compact('alat'));
    }

    public function showProtektanaman()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 2)
            ->get();

        return view('fakultas.faperta.proteksi_tanaman', compact('alat'));
    }

    public function showIlmutanah()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 3)
            ->get();

        return view('fakultas.faperta.ilmutanah', compact('alat'));
    }

    public function showLabFisikLahan1()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 3)
            ->where('l.id_lab', 22)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.ilmutanah', compact('alat'));
    }

    public function showLabFisikLahan2()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 3)
            ->where('l.id_lab', 23)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.ilmutanah', compact('alat'));
    }

    public function showLanskap()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 4)
            ->get();

        return view('fakultas.faperta.lanskap', compact('alat'));
    }

    public function showLabTth20()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 4)
            ->where('l.id_lab', 24)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.lanskap', compact('alat'));
    }

    public function showLabPrepLanskap()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 1)
            ->where('d.id_departemen', 4)
            ->where('l.id_lab', 25)
            ->select('a.*')
            ->get();

        return view('fakultas.faperta.lanskap', compact('alat'));
    }

    public function showSkhb()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 2)
            ->where('d.id_departemen', 5)
            ->get();

        return view('fakultas.skhb.skhb', compact('alat'));
    }

    public function showFpik()
    {
        return view('fakultas.fpik.fpik');
    }

    public function showBudidayaperairan()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 3)
            ->where('d.id_departemen', 7)
            ->get();

        return view('fakultas.fpik.budidayaperairan', compact('alat'));
    }

    public function showHasilperairan()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 3)
            ->where('d.id_departemen', 10)
            ->get();

        return view('fakultas.fpik.hasil_perairan', compact('alat'));
    }

    public function showItk()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 3)
            ->where('d.id_departemen', 9)
            ->get();

        return view('fakultas.fpik.itk', compact('alat'));
    }

    public function showSumberdayaperairan()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 3)
            ->where('d.id_departemen', 8)
            ->get();

        return view('fakultas.fpik.sumberdayaperairan', compact('alat'));
    }

    public function showSumberdayaikan()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 3)
            ->where('d.id_departemen', 6)
            ->get();

        return view('fakultas.fpik.sumberdayaperikanan', compact('alat'));
    }

    public function showFapet()
    {
        return view('fakultas.fapet.fapet');
    }

    public function showNutrisipakan()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 4)
            ->where('d.id_departemen', 11)
            ->get();

        return view('fakultas.fapet.nutrisipakan', compact('alat'));
    }

    public function showProduksiternak()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 4)
            ->where('d.id_departemen', 12)
            ->get();

        return view('fakultas.fapet.produksiternak', compact('alat'));
    }

    public function showFahutan()
    {
        return view('fakultas.fahutan.fahutan');
    }

    public function showHasilhutan()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 5)
            ->where('d.id_departemen', 13)
            ->get();

        return view('fakultas.fahutan.hasilhutan', compact('alat'));
    }

    public function showManajemenfahutan()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 5)
            ->where('d.id_departemen', 16)
            ->get();

        return view('fakultas.fahutan.manajemenfahutan', compact('alat'));
    }

    public function showSdhekowisata()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 5)
            ->where('d.id_departemen', 15)
            ->get();

        return view('fakultas.fahutan.sdhekowisata', compact('alat'));
    }

    public function showSilvikultur()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 5)
            ->where('d.id_departemen', 14)
            ->get();

        return view('fakultas.fahutan.silvikultur', compact('alat'));
    }

    public function showFateta()
    {
        return view('fakultas.fateta.fateta');
    }

    public function showIndustripertanian()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 6)
            ->where('d.id_departemen', 20)
            ->get();

        return view('fakultas.fateta.industripertanian', compact('alat'));
    }

    public function showItp()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 6)
            ->where('d.id_departemen', 17)
            ->get();

        return view('fakultas.fateta.itp', compact('alat'));
    }

    public function showMesinbio()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 6)
            ->where('d.id_departemen', 18)
            ->get();

        return view('fakultas.fateta.mesinbio', compact('alat'));
    }

    public function showSipillingkungan()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 6)
            ->where('d.id_departemen', 19)
            ->get();

        return view('fakultas.fateta.sipillingkungan', compact('alat'));
    }

    public function showFmipa()
    {
        return view('fakultas.fmipa.fmipa');
    }

    public function showBiokimia()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 7)
            ->where('d.id_departemen', 26)
            ->get();

        return view('fakultas.fmipa.biokimia', compact('alat'));
    }

    public function showBiologi()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 7)
            ->where('d.id_departemen', 22)
            ->get();

        return view('fakultas.fmipa.biologi', compact('alat'));
    }

    public function showFisika()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 7)
            ->where('d.id_departemen', 25)
            ->get();

        return view('fakultas.fmipa.fisika', compact('alat'));
    }

    public function showGeofisikameo()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 7)
            ->where('d.id_departemen', 21)
            ->get();

        return view('fakultas.fmipa.geofisikameo', compact('alat'));
    }

    public function showIlkom()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 7)
            ->where('d.id_departemen', 24)
            ->get();

        return view('fakultas.fmipa.ilkom', compact('alat'));
    }

    public function showKimia()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 7)
            ->where('d.id_departemen', 23)
            ->get();

        return view('fakultas.fmipa.kimia', compact('alat'));
    }

    public function showFem()
    {
        return view('fakultas.fem.fem');
    }

    public function showAgribisnis()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 8)
            ->where('d.id_departemen', 33)
            ->get();

        return view('fakultas.fem.agribisnis', compact('alat'));
    }

    public function showEkonomi()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 8)
            ->where('d.id_departemen', 34)
            ->get();

        return view('fakultas.fem.ekonomi', compact('alat'));
    }

    public function showEkonomisdl()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 8)
            ->where('d.id_departemen', 35)
            ->get();

        return view('fakultas.fem.ekonomisdl', compact('alat'));
    }

    public function showEkonomisyariah()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 8)
            ->where('d.id_departemen', 36)
            ->get();

        return view('fakultas.fem.ekonomisyariah', compact('alat'));
    }

    public function showManajemen()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 8)
            ->where('d.id_departemen', 27)
            ->get();

        return view('fakultas.fem.manajemen', compact('alat'));
    }

    public function showFema()
    {
        return view('fakultas.fema.fema');
    }

    public function showGizimasyarakat()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 9)
            ->where('d.id_departemen', 30)
            ->get();

        return view('fakultas.fema.gizimasyarakat', compact('alat'));
    }

    public function showIkk()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 9)
            ->where('d.id_departemen', 28)
            ->get();

        return view('fakultas.fema.ikk', compact('alat'));
    }

    public function showSainskom()
    {
        $alat = DB::table('alat as a')
            ->join('lab as l', 'a.id_lab', '=', 'l.id_lab')
            ->join('departemen as d', 'd.id_departemen', '=', 'l.id_departemen')
            ->join('fakultas as f', 'f.id_fakultas', '=', 'd.id_fakultas')
            ->where('f.id_fakultas', 9)
            ->where('d.id_departemen', 29)
            ->get();

        return view('fakultas.fema.sainskom', compact('alat'));
    }

    public function showKontak()
    {
        return view('kontak.kontak');
    }

    public function showBerita()
    {
        return view('berita.berita');
    }

    // public function showPeminjaman()
    // {
    //     return view('fakultas.peminjaman.peminjaman');
    // }
    public function showLogin()
    {
        return view('inilamanlogin');
    }
}