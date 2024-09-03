<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.beranda');
});

Route::get('/login', function () {
    return view('cth.inilamanlogin');
});


Route::middleware(['guest'])->group(function () {
    Route::get('/fakultas', [IndexController::class, 'showFakultas']);
    Route::get('/faperta', [IndexController::class, 'showFaperta']);
    Route::get('/agro', [IndexController::class, 'showAgro'])->name('agro');
    Route::get('/proteksi_tanaman', [IndexController::class, 'showProtektanaman']);
    Route::get('/ilmutanah', [IndexController::class, 'showIlmutanah']);
    Route::get('/lanskap', [IndexController::class, 'showLanskap']);
    Route::get('/skhb', [IndexController::class, 'showSkhb']);
    Route::get('/fpik', [IndexController::class, 'showFpik']);
    Route::get('/budidayaperairan', [IndexController::class, 'showBudidayaperairan']);
    Route::get('/hasil_perairan', [IndexController::class, 'showHasilperairan']);
    Route::get('/itk', [IndexController::class, 'showItk']);
    Route::get('/sumberdayaperairan', [IndexController::class, 'showSumberdayaperairan']);
    Route::get('/sumberdayaperikanan', [IndexController::class, 'showSumberdayaikan']);
    Route::get('/fapet', [IndexController::class, 'showFapet']);
    Route::get('/nutrisipakan', [IndexController::class, 'showNutrisipakan']);
    Route::get('/produksiternak', [IndexController::class, 'showProduksiternak']);
    Route::get('/fahutan', [IndexController::class, 'showFahutan']);
    Route::get('/hasilhutan', [IndexController::class, 'showHasilhutan']);
    Route::get('/manajemenfahutan', [IndexController::class, 'showManajemenfahutan']);
    Route::get('/sdhekowisata', [IndexController::class, 'showSdhekowisata']);
    Route::get('/silvikultur', [IndexController::class, 'showSilvikultur']);
    Route::get('/fateta', [IndexController::class, 'showFateta']);
    Route::get('/industripertanian', [IndexController::class, 'showIndustripertanian']);
    Route::get('/itp', [IndexController::class, 'showItp']);
    Route::get('/mesinbio', [IndexController::class, 'showMesinbio']);
    Route::get('/sipillingkungan', [IndexController::class, 'showSipillingkungan']);
    Route::get('/fmipa', [IndexController::class, 'showFmipa']);
    Route::get('/biokimia', [IndexController::class, 'showBiokimia']);
    Route::get('/biologi', [IndexController::class, 'showBiologi']);
    Route::get('/fisika', [IndexController::class, 'showFisika']);
    Route::get('/geofisikameo', [IndexController::class, 'showGeofisikameo']);
    Route::get('/ilkom', [IndexController::class, 'showIlkom']);
    Route::get('/kimia', [IndexController::class, 'showKimia']);
    Route::get('/fem', [IndexController::class, 'showFem']);
    Route::get('/agribisnis', [IndexController::class, 'showAgribisnis']);
    Route::get('/ekonomi', [IndexController::class, 'showEkonomi']);
    Route::get('/ekonomisdl', [IndexController::class, 'showEkonomisdl']);
    Route::get('/ekonomisyariah', [IndexController::class, 'showEkonomisyariah']);
    Route::get('/manajemen', [IndexController::class, 'showManajemen']);
    Route::get('/fema', [IndexController::class, 'showFema']);
    Route::get('/gizimasyarakat', [IndexController::class, 'showGizimasyarakat']);
    Route::get('/ikk', [IndexController::class, 'showIkk']);
    Route::get('/sainskom', [IndexController::class, 'showSainskom']);
    Route::get('/kontak', [IndexController::class, 'showKontak']);

    //Baru
    Route::post('/login', [LoginController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/admin');
});


Route::middleware(['auth'])->group(function () {
    //Admin
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:Admin');
    //fakultas
    Route::get('/fakultas', [FakultasController::class, 'index'])->middleware('userAkses:Admin');
    //departemen
    Route::get('/departemen', [DepartemenController::class, 'index'])->middleware('userAkses:Admin');
    Route::post('/departemen/store', [DepartemenController::class, 'store'])->middleware('userAkses:Admin')->name('departemen.store');
    Route::get('/departemen/edit-data/{id}', [DepartemenController::class, 'getEditData'])->middleware('userAkses:Admin');
    Route::post('/departemen/delete/{id}', [DepartemenController::class, 'destroy'])->middleware('userAkses:Admin')->name('departemen.delete');
    Route::put('/departemen/{id}', [DepartemenController::class, 'update'])->name('departemen.update');
    //lab
    Route::get('/lab', [LabController::class, 'index'])->middleware('userAkses:Admin');
    //alat
    Route::get('/alat', [AlatController::class, 'index'])->middleware('userAkses:Admin');
    Route::post('/alat', [AlatController::class, 'addAlatData'])->middleware('userAkses:Admin')->name('alat.add');
    Route::put('/alat/{id}', [AlatController::class, 'updateAlatData'])->middleware('userAkses:Admin')->name('alat.update');
    Route::put('/alat/{id}/delete', [AlatController::class, 'deleteAlatData'])->middleware('userAkses:Admin')->name('alat.delete');
    // peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->middleware('userAkses:Admin');
    Route::put('/peminjaman/{id}', [PeminjamanController::class, 'approve'])->middleware('userAkses:Admin')->name('peminjaman.approve');
    Route::get('/peminjaman/{id}/batal', [PeminjamanController::class, 'batal'])->name('peminjaman.batal');
    Route::get('/peminjaman/pdfall', [PeminjamanController::class, 'downloadPDFAll'])->name('admin.downloadPDFAll');
    //dosen
    Route::get('/dosen', [DosenController::class, 'index'])->middleware('userAkses:Admin');

    //User
    Route::get('/user', [UserController::class, 'index'])->middleware('userAkses:User');
    //peminjaman user
    Route::get('/peminjamanUser', [PeminjamanController::class, 'indexUser'])->middleware('userAkses:User')->name('user.peminjaman.index');
    Route::post('/user/peminjaman/store', [PeminjamanController::class, 'store'])->name('user.peminjaman.store');
    Route::get('/peminjaman/edit/{id}', [PeminjamanController::class, 'edit']);
    Route::put('/peminjamanUser/{id}', [PeminjamanController::class, 'update'])->name('peminjamanUser.update');
    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    Route::post('/peminjaman/kembalikan/{id}', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');
    Route::post('/peminjaman/batal/{id}', [PeminjamanController::class, 'batalpengembalian'])->name('peminjaman.batalpengembalian');
    Route::get('/peminjaman/{id}/pdf', [PeminjamanController::class, 'downloadPDF'])->name('peminjaman.downloadPDF');


    //superadmin
    Route::get('/superadmin', [SuperadminController::class, 'index'])->middleware('userAkses:Superadmin');
    Route::get('/fakultasSA', [SuperadminController::class, 'fakultas'])->middleware('userAkses:Superadmin');
    Route::get('/departemenSA', [SuperadminController::class, 'departemen'])->middleware('userAkses:Superadmin');
    Route::get('/labSA', [SuperadminController::class, 'lab'])->middleware('userAkses:Superadmin');
    Route::get('/alatSA', [SuperadminController::class, 'alat'])->middleware('userAkses:Superadmin');
    Route::get('/userSA', [SuperadminController::class, 'user'])->middleware('userAkses:Superadmin');
    Route::get('/peminjamanSA', [SuperadminController::class, 'peminjaman'])->middleware('userAkses:Superadmin');

    Route::get('/logout', [LoginController::class, 'logout']);
});