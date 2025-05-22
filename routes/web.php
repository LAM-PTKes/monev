<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PPSController;
use App\Http\Controllers\RNDController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SPMIController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\MonevITController;
use App\Http\Controllers\MonevKeuController;
use App\Http\Controllers\MonevAkreController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\MonevKepegController;
use App\Http\Controllers\SekretariatController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);

Route::get('/GetUser', [BackupController::class, 'GetUser'])->name('GetUser');
Route::get('/GetIsi', [BackupController::class, 'GetIsi'])->name('GetIsi');
Route::get('/GetKeu', [BackupController::class, 'GetKeu'])->name('GetKeu');

Auth::routes(['verify' => true]);
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/monev/hasil/evaluasi', [MonevITController::class, 'HasilEvaluasi'])->name('HasilEvaluasi');
    Route::get('/dashboard/cari/jumlah/monev', [HomeController::class, 'cari'])->name('CariMonevDash');

    Route::group(['middleware' => ['role:Ngadimin,Admin']], function () {
        Route::get('/unit-kerja', [UnitKerjaController::class, 'index'])->name('unitkerja');
        Route::post('/unit-kerja/store', [UnitKerjaController::class, 'store'])->name('sunitkerja');
        Route::get('/unit-kerja/edit', [UnitKerjaController::class, 'edit'])->name('eunitkerja');
        Route::delete('/unit-kerja/{id}/delete', [UnitKerjaController::class, 'destroy'])->name('dunitkerja');

        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::post('/user/store', [UserController::class, 'store'])->name('suser');
        Route::get('/user/edit', [UserController::class, 'edit'])->name('euser');
        Route::delete('/user/{id}/delete', [UserController::class, 'destroy'])->name('duser');

        Route::get('/role', [RoleController::class, 'index'])->name('role');
        Route::post('/role/store', [RoleController::class, 'store'])->name('srole');
        Route::get('/role/edit', [RoleController::class, 'edit'])->name('erole');
        Route::delete('/role/{id}/delete', [RoleController::class, 'destroy'])->name('drole');

        Route::get('/role/user', [RoleController::class, 'create'])->name('RoleUser');
        Route::post('/role/user/store', [RoleController::class, 'show'])->name('SRoleUser');
        Route::get('/role/user/edit', [RoleController::class, 'update'])->name('ERoleUser');
        Route::delete('/role/user/{id}/delete', [RoleController::class, 'hapus'])->name('DRoleUser');


        Route::get('/backup/user', [BackupController::class, 'index'])->name('BackupUser');
        Route::get('/backup/isi/monev', [BackupController::class, 'create'])->name('BackupIsi');
        Route::get('/backup/monev/keu', [BackupController::class, 'show'])->name('BackupKeu');
    });

    Route::group(['middleware' => ['role:Ngadimin,Admin,IT,Sekretariat']], function () {
        Route::get('/monev/it', [MonevITController::class, 'index'])->name('MonevIT');
        Route::post('/monev/it/create', [MonevITController::class, 'create'])->name('cMonevIT');
        Route::post('/monev/it/store', [MonevITController::class, 'store'])->name('sMonevIT');
        Route::get('/monev/it/edit', [MonevITController::class, 'edit'])->name('eMonevIT');
        Route::post('/monev/it/export', [MonevITController::class, 'export'])->name('ExMonevIT');
        Route::get('/monev/it/cari', [MonevITController::class, 'cari'])->name('CariMonevIT');
        Route::delete('/monev/it/{id}/delete', [MonevITController::class, 'destroy'])->name('dMonevIT');
    });

    Route::group(['middleware' => ['role:Ngadimin,Admin,Akreditasi,Sekretariat']], function () {
        Route::get('/monev/akreditasi', [MonevAkreController::class, 'index'])->name('MonevAkre');
        Route::post('/monev/akreditasi/create', [MonevAkreController::class, 'create'])->name('cMonevAkre');
        Route::post('/monev/akreditasi/store', [MonevAkreController::class, 'store'])->name('sMonevAkre');
        Route::get('/monev/akreditasi/edit', [MonevAkreController::class, 'edit'])->name('eMonevAkre');
        Route::post('/monev/akreditasi/export', [MonevAkreController::class, 'export'])->name('ExMonevAkre');
        Route::get('/monev/akreditasi/cari', [MonevAkreController::class, 'cari'])->name('CariMonevAkre');
        Route::delete('/monev/akreditasi/{id}/delete', [MonevAkreController::class, 'destroy'])->name('dMonevAkre');
    });

    Route::group(['middleware' => ['role:Ngadimin,Admin,Kepegawaian,Sekretariat']], function () {
        Route::get('/monev/kepegawaian', [MonevKepegController::class, 'index'])->name('MonevKepeg');
        Route::post('/monev/kepegawaian/create', [MonevKepegController::class, 'create'])->name('cMonevKepeg');
        Route::post('/monev/kepegawaian/store', [MonevKepegController::class, 'store'])->name('sMonevKepeg');
        Route::get('/monev/kepegawaian/edit', [MonevKepegController::class, 'edit'])->name('eMonevKepeg');
        Route::post('/monev/kepegawaian/export', [MonevKepegController::class, 'export'])->name('ExMonevKepeg');
        Route::get('/monev/kepegawaian/cari', [MonevKepegController::class, 'cari'])->name('CariMonevKepeg');
        Route::delete('/monev/kepegawaian/{id}/delete', [MonevKepegController::class, 'destroy'])->name('dMonevKepeg');
    });

    Route::group(['middleware' => ['role:Ngadimin,Admin,Keuangan,Sekretariat']], function () {
        Route::get('/monev/keuangan', [MonevKeuController::class, 'index'])->name('MonevKeu');
        Route::post('/monev/keuangan/create', [MonevKeuController::class, 'create'])->name('cMonevKeu');
        Route::post('/monev/keuangan/store', [MonevKeuController::class, 'store'])->name('sMonevKeu');
        Route::post('/monev/keuangan/simpan', [MonevKeuController::class, 'simpan'])->name('gMonevKeu');
        Route::get('/monev/keuangan/edit', [MonevKeuController::class, 'edit'])->name('eMonevKeu');
        Route::post('/monev/keuangan/export', [MonevKeuController::class, 'export'])->name('ExMonevKeu');
        Route::get('/monev/keuangan/cari', [MonevKeuController::class, 'cari'])->name('CariMonevKeu');
        Route::delete('/monev/keuangan/{id}/delete', [MonevKeuController::class, 'destroy'])->name('dMonevKeu');
        Route::delete('/monev/keuangan/form/{id}/delete', [MonevKeuController::class, 'hapus'])->name('hMonevKeu');
    });

    Route::group(['middleware' => ['role:Ngadimin,Admin,PPS,Sekretariat']], function () {
        Route::get('/monev/pengembangan-pelatihan-sertifikasi', [PPSController::class, 'index'])->name('MonevPPS');
        Route::post('/monev/pengembangan-pelatihan-sertifikasi/create', [PPSController::class, 'create'])->name('cMonevPPS');
        Route::post('/monev/pengembangan-pelatihan-sertifikasi/store', [PPSController::class, 'store'])->name('sMonevPPS');
        Route::get('/monev/pengembangan-pelatihan-sertifikasi/edit', [PPSController::class, 'edit'])->name('eMonevPPS');
        Route::post('/monev/pengembangan-pelatihan-sertifikasi/export', [PPSController::class, 'export'])->name('ExMonevPPS');
        Route::get('/monev/pengembangan-pelatihan-sertifikasi/cari', [PPSController::class, 'cari'])->name('CariMonevPPS');
        Route::delete('/monev/pengembangan-pelatihan-sertifikasi/{id}/delete', [PPSController::class, 'destroy'])->name('dMonevPPS');
    });

    Route::group(['middleware' => ['role:Ngadimin,Admin,RnD,Sekretariat']], function () {
        Route::get('/monev/research-dan-development', [RNDController::class, 'index'])->name('MonevRnD');
        Route::post('/monev/research-dan-development/create', [RNDController::class, 'create'])->name('cMonevRnD');
        Route::post('/monev/research-dan-development/store', [RNDController::class, 'store'])->name('sMonevRnD');
        Route::get('/monev/research-dan-development/edit', [RNDController::class, 'edit'])->name('eMonevRnD');
        Route::post('/monev/research-dan-development/export', [RNDController::class, 'export'])->name('ExMonevRnD');
        Route::get('/monev/research-dan-development/cari', [RNDController::class, 'cari'])->name('CariMonevRnD');
        Route::delete('/monev/research-dan-development/{id}/delete', [RNDController::class, 'destroy'])->name('dMonevRnD');
    });

    Route::group(['middleware' => ['role:Ngadimin,Admin,Sarana,Sekretariat']], function () {
        Route::get('/monev/sarana', [SaranaController::class, 'index'])->name('MonevSarana');
        Route::post('/monev/sarana/create', [SaranaController::class, 'create'])->name('cMonevSarana');
        Route::post('/monev/sarana/store', [SaranaController::class, 'store'])->name('sMonevSarana');
        Route::get('/monev/sarana/edit', [SaranaController::class, 'edit'])->name('eMonevSarana');
        Route::post('/monev/sarana/export', [SaranaController::class, 'export'])->name('ExMonevSarana');
        Route::get('/monev/sarana/cari', [SaranaController::class, 'cari'])->name('CariMonevSarana');
        Route::delete('/monev/sarana/{id}/delete', [SaranaController::class, 'destroy'])->name('dMonevSarana');
    });

    Route::group(['middleware' => ['role:Ngadimin,Admin,SPMI,Sekretariat']], function () {
        Route::get('/monev/SPMI', [SPMIController::class, 'index'])->name('MonevSPMI');
        Route::post('/monev/SPMI/create', [SPMIController::class, 'create'])->name('cMonevSPMI');
        Route::post('/monev/SPMI/store', [SPMIController::class, 'store'])->name('sMonevSPMI');
        Route::get('/monev/SPMI/edit', [SPMIController::class, 'edit'])->name('eMonevSPMI');
        Route::post('/monev/SPMI/export', [SPMIController::class, 'export'])->name('ExMonevSPMI');
        Route::get('/monev/SPMI/cari', [SPMIController::class, 'cari'])->name('CariMonevSPMI');
        Route::delete('/monev/SPMI/{id}/delete', [SPMIController::class, 'destroy'])->name('dMonevSPMI');
    });

    Route::group(['middleware' => ['role:Ngadimin,Admin,Sekretariat']], function () {
        Route::get('/monev/sekretariat', [SekretariatController::class, 'index'])->name('MonevSekre');
        Route::post('/monev/sekretariat/create', [SekretariatController::class, 'create'])->name('cMonevSekre');
        Route::post('/monev/sekretariat/store', [SekretariatController::class, 'store'])->name('sMonevSekre');
        Route::get('/monev/sekretariat/edit', [SekretariatController::class, 'edit'])->name('eMonevSekre');
        Route::post('/monev/sekretariat/export', [SekretariatController::class, 'export'])->name('ExMonevSekre');
        Route::get('/monev/sekretariat/cari', [SekretariatController::class, 'cari'])->name('CariMonevSekre');
        Route::delete('/monev/sekretariat/{id}/delete', [SekretariatController::class, 'destroy'])->name('dMonevSekre');
    });
});
