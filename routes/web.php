<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbsensiController;

// Dashboard Controllers
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\PT\DashboardController as PTDashboardController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;

// Admin Controllers
use App\Http\Controllers\Admin\PaketGymController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PTController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\RekapController;
use App\Http\Controllers\Admin\MembershipsController;
use App\Http\Controllers\Admin\SesiController;
use App\Http\Controllers\Admin\AbsensisController;

// Member Controller
use App\Http\Controllers\Member\MembershipController;
use App\Http\Controllers\Member\MembersController;
use App\Http\Controllers\Member\TransaksisController;
use App\Http\Controllers\Member\SesisController;

// PT Controller
use App\Http\Controllers\PT\SesissController;




/*
| Public Route
*/

Route::get('/', function () {
    return view('welcome');
});


/*
| Redirect Dashboard Berdasarkan Role
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {

        if(auth()->user()->role === 'admin' || auth()->user()->role === 'pegawai'){
            return redirect()->route('admin.dashboard');
        }

        if(auth()->user()->role === 'pt'){
            return redirect()->route('pt.dashboard');
        }

        return redirect()->route('member.dashboard');

    })->name('dashboard');

});


/*
| ADMIN ROUTES
*/

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function(){

    Route::get('/dashboard', [AdminDashboardController::class,'index'])
        ->name('admin.dashboard');

    Route::resource('paket', PaketGymController::class);
    Route::resource('member', MemberController::class);
    Route::resource('personaltrainer', PTController::class);

    Route::get('/transaksi', [TransaksiController::class,'index'])
        ->name('admin.transaksi');
    Route::post('transaksi/{id}/approve', [TransaksiController::class, 'approve'])->name('admin.transaksi.approve');
    Route::post('transaksi/{id}/reject', [TransaksiController::class, 'reject'])->name('admin.transaksi.reject');
    Route::get('/rekap', [RekapController::class,'index'])
        ->name('admin.rekap');
    Route::get('/membership', [MembershipsController::class,'index'])
        ->name('admin.membership');
    Route::resource('sesi', SesiController::class);
    Route::get('/absensi', [AbsensisController::class,'index'])
        ->name('absensi.index');

});


/*
| PT ROUTES
*/

Route::middleware(['auth','role:pt'])->prefix('pt')->group(function(){

    Route::get('/dashboard', [PTDashboardController::class,'index'])
        ->name('pt.dashboard');
    Route::resource('sesi', SesissController::class)->only([
    'index','edit','update']);
});


/*
| MEMBER ROUTES
*/

Route::middleware(['auth','role:member'])->prefix('member')->group(function(){

    Route::get('/dashboard', [MemberDashboardController::class,'index'])
        ->name('member.dashboard');
        Route::resource('membership', MembershipController::class);
        Route::resource('members', MembersController::class);
        Route::resource('transaksi', TransaksisController::class);
        Route::post('transaksi/{id}/upload', [TransaksisController::class, 'uploadBukti'])->name('member.transaksi.upload');
        Route::get('sesi', [SesisController::class, 'index'])->name('member.sesi.index');
});


/*
| ABSENSI QR ROUTE
*/

Route::post('/scan-qr/{token}', [AbsensiController::class,'scan'])
    ->middleware('auth')
    ->name('scan.qr');

 /*
 | PROFILE
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class,'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class,'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class,'password'])->name('profile.password');
    Route::delete('/profile/delete', [ProfileController::class,'delete'])->name('profile.delete');
});


require __DIR__.'/auth.php';
