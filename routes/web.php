<?php

use App\Http\Controllers\admin\AdminListController;
use App\Http\Controllers\admin\AuthController as AdminAuthController;
use App\Http\Controllers\admin\BukuController as AdminBukuController;
use App\Http\Controllers\admin\PengembalianController as AdminPengembalianController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\PeminjamanController;
use App\Http\Controllers\admin\RuanganController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\DashboardUserController;
use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\user\BookingController;
use App\Http\Controllers\user\BookmarkController;
use App\Http\Controllers\user\BukuController;
use App\Http\Controllers\user\LikeBookController;
use App\Http\Controllers\user\PinjamanController;
use App\Http\Controllers\user\PengembalianController;
use App\Http\Controllers\user\RiwayatController;
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

// authorized routes
Route::get('/user/mobile-only', function () {
    return view('exception.mobile_alert');
})->name('mobile-only');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/kirim_masukan', [HomeController::class, 'kirim_masukan'])->name('kirim_masukan');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'index'])->name('login_admin');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login_admin');

    Route::middleware('auth:admin')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/download_report', [DashboardController::class, 'download_report'])->name('admin.download_report');
        // buku
        Route::get('/book', [AdminBukuController::class, 'index'])->name('admin.book');
        Route::get('/book/getDataBuku', [AdminBukuController::class, 'getDataBuku'])->name('admin.book.getDataBuku');
        Route::get('/book/add', [AdminBukuController::class, 'create'])->name('admin.book.create');
        Route::post('/book/store', [AdminBukuController::class, 'store'])->name('admin.book.store');
        Route::get('/book/edit/{isbn}', [AdminBukuController::class, 'edit'])->name('admin.book.edit');
        Route::put('/book/update/{isbn}', [AdminBukuController::class, 'update'])->name('admin.book.update');
        Route::delete('/book/delete/{isbn}', [AdminBukuController::class, 'destroy'])->name('admin.book.delete');
        // member
        Route::get('/users', [MemberController::class, 'index'])->name('admin.users');
        Route::get('/users/getDataMember', [MemberController::class, 'getDataMember'])->name('admin.users.getDataMember');
        Route::get('/users/edit/{npm}', [MemberController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/update/{npm}', [MemberController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/delete/{npm}', [MemberController::class, 'destroy'])->name('admin.users.delete');
        // peminjaman
        Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('admin.peminjaman');
        Route::get('/peminjaman/getDataPeminjaman', [PeminjamanController::class, 'getPeminjamanAll'])->name('admin.peminjaman.getDataPeminjaman');
        Route::get('/peminjaman/add', [PeminjamanController::class, 'addPeminjaman'])->name('admin.peminjaman.add');
        Route::get('/peminjaman/getDataMember', [PeminjamanController::class, 'getDataMember'])->name('admin.peminjaman.getDataMember');
        Route::get('/peminjaman/getDataBuku', [PeminjamanController::class, 'getDataBuku'])->name('admin.peminjaman.getDataBuku');
        Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('admin.peminjaman.store');
        Route::get('/peminjaman/edit/{id}', [PeminjamanController::class, 'edit'])->name('admin.peminjaman.edit');
        Route::put('/peminjaman/update/{id}', [PeminjamanController::class, 'update'])->name('admin.peminjaman.update');
        Route::delete('/peminjaman/delete/{id}', [PeminjamanController::class, 'destroy'])->name('admin.peminjaman.delete');
        // pengembalian
        Route::get('/pengembalian', [AdminPengembalianController::class, 'index'])->name('admin.pengembalian');
        Route::get('/pengembalian/getDataPengembalian', [AdminPengembalianController::class, 'getDataPengembalian'])->name('admin.pengembalian.getDataPengembalian');
        Route::get('/pengembalian/detail/{id}', [AdminPengembalianController::class, 'detail'])->name('admin.pengembalian.detail');
        Route::get('/pengembalian/daftarPeminjaman', [AdminPengembalianController::class, 'daftarPeminjaman'])->name('admin.pengembalian.daftarPeminjaman');
        Route::get('/pengembalian/getDataPeminjaman', [AdminPengembalianController::class, 'getDataPeminjaman'])->name('admin.pengembalian.getDataPeminjaman');
        Route::get('/pengembalian/detailDataPeminjaman/{id}', [AdminPengembalianController::class, 'detailDataPeminjaman'])->name('admin.pengembalian.detailDataPeminjaman');
        Route::post('/pengembalian/acceptPengembalian', [AdminPengembalianController::class, 'acceptPengembalian'])->name('admin.pengembalian.acceptPengembalian');
        Route::post('/pengembalian/sendNotifikasi', [AdminPengembalianController::class, 'sendNotifikasi'])->name('admin.pengembalian.sendNotifikasi');
        // req pengembalian
        Route::get('/pengembalian/req', [AdminPengembalianController::class, 'req'])->name('admin.pengembalian.req');
        Route::get('/pengembalian/req/getDataPengembalian', [AdminPengembalianController::class, 'getDataPengembalianReq'])->name('admin.pengembalian.req.getDataPengembalian');
        Route::get('/pengembalian/req/detail/{id}', [AdminPengembalianController::class, 'detailReq'])->name('admin.pengembalian.req.detail');
        Route::post('/pengembalian/req/acceptReq', [AdminPengembalianController::class, 'acceptReq'])->name('admin.pengembalian.req.acceptReq');
        Route::post('/pengembalian/req/rejectReq', [AdminPengembalianController::class, 'rejectReq'])->name('admin.pengembalian.req.rejectReq');
        // ruangan
        Route::get('/ruangan', [RuanganController::class, 'index'])->name('admin.ruangan');
        Route::get('/ruangan/getDataRuangan', [RuanganController::class, 'getDataRuangan'])->name('admin.ruangan.getDataRuangan');
        Route::post('/ruangan/tambahRuangan', [RuanganController::class, 'tambahRuangan'])->name('admin.ruangan.tambahRuangan');
        Route::put('/ruangan/editRuangan', [RuanganController::class, 'editRuangan'])->name('admin.ruangan.editRuangan');
        Route::delete('/ruangan/deleteRuangan/{kode_ruangan}', [RuanganController::class, 'deleteRuangan'])->name('admin.ruangan.deleteRuangan');
        // booking
        Route::get('/ruangan/booking', [RuanganController::class, 'bookingRuangan'])->name('admin.ruangan.booking');
        Route::get('/ruangan/booking/getDataBooking', [RuanganController::class, 'getDataBooking'])->name('admin.ruangan.booking.getDataBooking');
        // admin
        Route::get('/admin-list', [AdminListController::class, 'index'])->name('admin.admin-list');
        Route::get('/admin-list/getDataAdmin', [AdminListController::class, 'getDataAdmin'])->name('admin.admin-list.getDataAdmin');
        Route::get('/admin-list/add', [AdminListController::class, 'create'])->name('admin.admin-list.create');
        Route::post('/admin-list/store', [AdminListController::class, 'store'])->name('admin.admin-list.store');
        Route::get('/admin-list/edit/{id}', [AdminListController::class, 'edit'])->name('admin.admin-list.edit');
        Route::put('/admin-list/update/{id}', [AdminListController::class, 'update'])->name('admin.admin-list.update');
        Route::delete('/admin-list/delete/{id}', [AdminListController::class, 'delete'])->name('admin.admin-list.delete');

        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout_admin');
    });
});

Route::prefix('user')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login_user');

    Route::post('/login', [AuthController::class, 'login'])->name('login_user');

    Route::post('/register', [AuthController::class, 'register'])->name('register_user');

    Route::get('/verify/{token}', [AuthController::class, 'verify'])->name('verify_user');

    Route::post('/kirim_ulang_email', [AuthController::class, 'kirim_ulang_email'])->name('kirim_ulang_email');
    
    
    Route::middleware('auth:users')->group(function() {
        // dashboard
        Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('dashboard');
        Route::put('/dashboard/update_notifikasi/{id}', [DashboardUserController::class, 'updateNotifikasi'])->name('dashboard.update_notifikasi');
        // profile
        Route::get('/profil', [DashboardUserController::class, 'profil'])->name('profil');
        Route::post('/profil/update-avatar', [DashboardUserController::class, 'updateAvatar'])->name('profil.update_avatar');
        // book
        Route::get('/book', [BukuController::class, 'index'])->name('book');
        Route::get('/book/{id}', [BukuController::class, 'detail'])->name('book.detail');
        // bookmark
        Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark');
        Route::post('/book/addBookmark/{id}', [BookmarkController::class, 'addBookmark'])->name('book.addBookmark');
        // like
        Route::get('/like', [LikeBookController::class, 'index'])->name('like');
        Route::post('/book/addLikeBook/{id}', [LikeBookController::class, 'addLikeBook'])->name('book.addLikeBook');
        // booking
        Route::get('/booking', [BookingController::class, 'index'])->name('booking');
        Route::get('/booking/checkRuangan/{kode_ruangan}/{date}', [BookingController::class, 'checkRuangan'])->name('booking.checkRuangan');
        Route::get('/booking/getDataBooking', [BookingController::class, 'getDataBooking'])->name('booking.getDataBooking');
        Route::post('/booking/bookingRuangan', [BookingController::class, 'bookingRuangan'])->name('booking.bookingRuangan');
        // peminjaman
        Route::get('/peminjaman_buku', [PinjamanController::class, 'index'])->name('peminjaman');
        Route::get('/checkBuku/{isbn}', [PinjamanController::class, 'checkBuku'])->name('peminjaman.checkBuku');
        Route::get('/peminjaman_buku/detail/{isbn}', [PinjamanController::class, 'detail'])->name('peminjaman.detail');
        Route::post('/peminjaman_buku/addPinjaman', [PinjamanController::class, 'addPinjaman'])->name('peminjaman.addPinjaman');
        // pengembalian
        Route::get('/pengembalian_buku', [PengembalianController::class, 'index'])->name('pengembalian');
        Route::get('/pengembalian_buku/{id}', [PengembalianController::class, 'detail'])->name('pengembalian.detail');
        Route::post('/pengembalian_buku/returnBook', [PengembalianController::class, 'returnBook'])->name('pengembalian.returnBook');
        Route::get('/pengembalian_buku/checkDataRequestPengembalian/{id_transaksi_peminjaman}', [PengembalianController::class, 'checkDataRequestPengembalian'])->name('pengembalian.checkDataRequestPengembalian');
        // riwayat
        Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
        Route::get('/riwayat/{id}', [RiwayatController::class, 'detail'])->name('riwayat.detail');
        // search
        Route::get('/search', [DashboardUserController::class, 'search'])->name('search');
        // logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout_user');
    });
});
