<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/admin/profile', [AdminController::class, 'indexProfileAdmin'])->middleware('userAkses:Admin');
    Route::put('/admin/profile/update/{id}', [AdminController::class, 'updateProfileAdmin'])->middleware('userAkses:Admin');
    Route::put('/admin/profile/update-pass/{id}', [AdminController::class, 'updateProfilePassAdmin'])->middleware('userAkses:Admin');

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
    Route::get('/lab/add', [LabController::class, 'addLabIndex'])->middleware('userAkses:Admin');
    Route::post('/lab/add', [LabController::class, 'addLab'])->middleware('userAkses:Admin');
    Route::get('/lab/{id_lab}/edit', [LabController::class, 'editLabIndex'])->middleware('userAkses:Admin');
    Route::put('/lab/{id_lab}/edit', [LabController::class, 'editLab'])->middleware('userAkses:Admin');
    Route::put('/lab/{id_lab}/delete', [LabController::class, 'deleteLab'])->middleware('userAkses:Admin');

    //alat
    Route::get('/alat', [AlatController::class, 'index'])->middleware('userAkses:Admin');
    Route::get('/alat/add', [AlatController::class, 'addAlatIndex'])->middleware('userAkses:Admin');
    Route::post('/alat', [AlatController::class, 'addAlatData'])->middleware('userAkses:Admin')->name('alat.add');

    // Edit Alat
    Route::get('/alat/{id}/edit', [AlatController::class, 'updateAlatIndex'])->middleware('userAkses:Admin')->name('alat.update.index');
    Route::put('/alat/{id}', [AlatController::class, 'updateAlatData'])->middleware('userAkses:Admin')->name('alat.update');
    Route::put('/alat/{id}/delete', [AlatController::class, 'deleteAlatData'])->middleware('userAkses:Admin')->name('alat.delete');

    // User Send Approval
    Route::put('/peminjaman-approval/{id}/', [AlatController::class, 'approvalPeminjaman'])->middleware('userAkses:Admin')->name('peminjaman.approval');

    // Peminjaman
    Route::get('/peminjaman-approval', [PeminjamanController::class, 'indexPeminjamanAdmin'])->middleware('userAkses:Admin');
    Route::get('/detail-peminjaman-approval/{id}', [PeminjamanController::class, 'indexDetailPeminjamanAdmin'])->middleware('userAkses:Admin');

    // Pengembalian
    Route::get('/pengembalian-approval', [PeminjamanController::class, 'indexPengembalianAdmin'])->middleware('userAkses:Admin');
    Route::get('/detail-pengembalian-approval/{id}', [PeminjamanController::class, 'indexDetailPengembalianAdmin'])->middleware('userAkses:Admin');

    // Download PDF
    Route::get('/peminjaman-download', [PDFController::class, 'viewPeminjamanDownload'])->middleware('userAkses:Admin')->name("peminjaman-download");
    Route::get('/table/peminjaman-download', [PDFController::class, 'viewTablePeminjaman'])->middleware('userAkses:Admin')->name("table-peminjaman");

    //dosen
    Route::get('/dosen', [DosenController::class, 'index'])->middleware('userAkses:Admin');

    //User
    Route::get('/user', [UserController::class, 'index'])->middleware('userAkses:User');
    Route::get('/user/profile', [UserController::class, 'indexProfileUser'])->middleware('userAkses:User');
    Route::put('/user/profile/update/{id}', [UserController::class, 'updateProfileUser'])->middleware('userAkses:User');
    Route::put('/user/profile/update-pass/{id}', [UserController::class, 'updateProfilePassUser'])->middleware('userAkses:User');

    //peminjaman user
    // Header peminjaman User
    Route::get('/header-peminjamanUser', [PeminjamanController::class, 'indexHeader'])->middleware('userAkses:User')->name('user.header-peminjaman.index');
    Route::get('/header-peminjamanUser/add', [PeminjamanController::class, 'addHeader'])->middleware('userAkses:User')->name('user.add-header-peminjaman.index');
    Route::post('/header-peminjamanUser/add', [PeminjamanController::class, 'storeHeader'])->middleware('userAkses:User')->name('user.header-peminjaman.store');
    Route::get('/header-peminjamanUser/{id}/edit', [PeminjamanController::class, 'editHeader'])->middleware('userAkses:User')->name('user.edit-header-peminjaman.index');
    Route::put('/header-peminjamanUser/{id}/edit', [PeminjamanController::class, 'updateHeader'])->middleware('userAkses:User')->name('user.header-peminjaman.update');
    Route::put('/header-peminjamanUser/{id}/delete', [PeminjamanController::class, 'deleteHeader'])->middleware('userAkses:User')->name('user.header-peminjaman.delete');

    // Detail peminjaman User
    Route::get('/detail-peminjamanUser/{id}', [PeminjamanController::class, 'indexDetail'])->middleware('userAkses:User')->name('user.detail-peminjaman.index');
    Route::get('/detail-peminjamanUser/{id}/add', [PeminjamanController::class, 'addDetail'])->middleware('userAkses:User')->name('user.add-detail-peminjaman.index');
    Route::post('/detail-peminjamanUser/{id}/add', [PeminjamanController::class, 'storeDetail'])->middleware('userAkses:User')->name('user.detail-peminjaman.store');
    Route::get('/detail-peminjamanUser/{id}/edit', [PeminjamanController::class, 'editDetail'])->middleware('userAkses:User')->name('user.edit-detail-peminjaman.index');
    Route::put('/detail-peminjamanUser/{id}/update', [PeminjamanController::class, 'updateDetail'])->middleware('userAkses:User')->name('user.detail-peminjaman.update');
    Route::put('/detail-peminjamanUser/{id}/delete', [PeminjamanController::class, 'deleteDetail'])->middleware('userAkses:User')->name('user.detail-peminjaman.delete');

    // Peminjaman Approval User
    Route::put('/peminjaman/{id}', [PeminjamanController::class, 'peminjamanApproval'])->middleware('userAkses:User')->name('peminjaman.approval');
    // Perbaikan Peminjaman User
    Route::put('/perbaikan-peminjaman/{id}', [PeminjamanController::class, 'perbaikanPeminjaman'])->middleware('userAkses:User')->name('perbaikan.peminjaman');
    // Pengembalian Approval User
    Route::put('/pengembalian/{id}', [PeminjamanController::class, 'pengembalianApproval'])->middleware('userAkses:User')->name('pengembalian.approval');

    // Detail Peminjaman Approval Admin
    Route::put('/peminjaman-approval/admin/{id}', [PeminjamanController::class, 'peminjamanApprovalAdmin'])->middleware('userAkses:Admin')->name('peminjaman-approval.admin');
    // Detail Pengembalian Approval Admin
    Route::put('/pengembalian-approval/admin/{id}', [PeminjamanController::class, 'pengembalianApprovalAdmin'])->middleware('userAkses:Admin')->name('pengembalian-approval.admin');

    Route::get('/peminjamanUser', [PeminjamanController::class, 'indexUser'])->middleware('userAkses:User')->name('user.peminjaman.index');
    Route::post('/user/peminjaman/store', [PeminjamanController::class, 'store'])->name('user.peminjaman.store');
    Route::get('/peminjaman/edit/{id}', [PeminjamanController::class, 'edit']);
    Route::put('/peminjamanUser/{id}', [PeminjamanController::class, 'update'])->name('peminjamanUser.update');
    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    Route::post('/peminjaman/kembalikan/{id}', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');
    Route::post('/peminjaman/batal/{id}', [PeminjamanController::class, 'batalpengembalian'])->name('peminjaman.batalpengembalian');

    //superadmin
    Route::get('/superadmin', [SuperadminController::class, 'index'])->middleware('userAkses:Superadmin');
    Route::get('/superadmin/profile', [SuperadminController::class, 'indexProfileSuperAdmin'])->middleware('userAkses:Superadmin');
    Route::put('/superadmin/profile/update/{id}', [SuperadminController::class, 'updateProfileAdmin'])->middleware('userAkses:Superadmin');
    Route::put('/superadmin/profile/update-pass/{id}', [SuperadminController::class, 'updateProfilePassAdmin'])->middleware('userAkses:Superadmin');

    // Superadmin Fakultas
    Route::get('/fakultasSA', [SuperadminController::class, 'fakultas'])->middleware('userAkses:Superadmin');
    Route::get('/fakultasSA/add', [SuperadminController::class, 'addFakultas'])->middleware('userAkses:Superadmin');
    Route::post('/fakultasSA/store', [SuperadminController::class, 'storeFakultas'])->middleware('userAkses:Superadmin');
    Route::get('/fakultasSA/edit/{id}', [SuperadminController::class, 'editFakultas'])->middleware('userAkses:Superadmin');
    Route::put('/fakultasSA/update/{id_fakultas}', [SuperadminController::class, 'updateFakultas'])->middleware('userAkses:Superadmin');
    Route::delete('/fakultasSA/delete/{id_fakultas}', [SuperadminController::class, 'destroyFakultas'])->middleware('userAkses:Superadmin');

    Route::get('/departemenSA', [SuperadminController::class, 'departemen'])->middleware('userAkses:Superadmin');
    Route::get('/departemenSA/add', [SuperadminController::class, 'addDepartemen'])->middleware('userAkses:Superadmin');
    Route::post('/departemenSA/store', [SuperadminController::class, 'storeDepartemen'])->middleware('userAkses:Superadmin');
    Route::get('/departemenSA/edit/{id}', [SuperadminController::class, 'editDepartemen'])->middleware('userAkses:Superadmin');
    Route::put('/departemenSA/update/{id}', [SuperadminController::class, 'updateDepartemen'])->middleware('userAkses:Superadmin');
    Route::delete('/departemenSA/delete/{id}', [SuperadminController::class, 'destroyDepartemen'])->middleware('userAkses:Superadmin');

    Route::get('/labSA', [SuperadminController::class, 'lab'])->middleware('userAkses:Superadmin');
    Route::get('/labSA/add', [SuperadminController::class, 'addLab'])->middleware('userAkses:Superadmin');
    Route::post('/labSA/store', [SuperadminController::class, 'storeLab'])->middleware('userAkses:Superadmin');
    Route::get('/labSA/edit/{id}', [SuperadminController::class, 'editLab'])->middleware('userAkses:Superadmin');
    Route::put('/labSA/update/{id}', [SuperadminController::class, 'updateLab'])->middleware('userAkses:Superadmin');
    Route::delete('/labSA/delete/{id}', [SuperadminController::class, 'destroyLab'])->middleware('userAkses:Superadmin');

    Route::get('/alatSA', [SuperadminController::class, 'alat'])->middleware('userAkses:Superadmin');
    Route::get('/alatSA/add', [SuperadminController::class, 'addAlat'])->middleware('userAkses:Superadmin');
    Route::post('/alatSA/store', [SuperadminController::class, 'storeAlat'])->middleware('userAkses:Superadmin');
    Route::get('/alatSA/edit/{id}', [SuperadminController::class, 'editAlat'])->middleware('userAkses:Superadmin');
    Route::put('/alatSA/update/{id}', [SuperadminController::class, 'updateAlat'])->middleware('userAkses:Superadmin');
    Route::delete('/alatSA/delete/{id}', [SuperadminController::class, 'destroyAlat'])->middleware('userAkses:Superadmin');

    Route::get('/userSA', [SuperadminController::class, 'user'])->middleware('userAkses:Superadmin');
    Route::get('/userSA/add', [SuperadminController::class, 'addUser'])->middleware('userAkses:Superadmin');
    Route::post('/userSA/store', [SuperadminController::class, 'storeUser'])->middleware('userAkses:Superadmin');
    Route::get('/userSA/edit/{id}', [SuperadminController::class, 'editUser'])->middleware('userAkses:Superadmin');
    Route::put('/userSA/update/{id}', [SuperadminController::class, 'updateUser'])->middleware('userAkses:Superadmin');
    Route::delete('/userSA/delete/{id}', [SuperadminController::class, 'destroyUser'])->middleware('userAkses:Superadmin');

    Route::get('/peminjamanSA', [SuperadminController::class, 'peminjaman'])->middleware('userAkses:Superadmin');

    Route::get('/logout', [LoginController::class, 'logout']);
});