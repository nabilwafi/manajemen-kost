<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\FrontendsController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Owner\BankController;
use App\Http\Controllers\Owner\BookListController;
use App\Http\Controllers\Owner\KamarController;
use App\Http\Controllers\Owner\PenghuniController;
use App\Http\Controllers\Owner\ProfileController;
use App\Http\Controllers\Owner\PromoController;
use App\Http\Controllers\User\MyRoomsController;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\Owner\UserDocumentController;
use App\Http\Controllers\Owner\UserVerificationController;
use App\Http\Controllers\Pdf\SuratController;
use App\Http\Controllers\RoomConditionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('select-regency', [KamarController::class, "selectRegency"]); // Select Regency
Route::get('select-district',[KamarController::class, "selectDistrict"]); // Select District

Auth::routes();

///// FRONTEND \\\\\
// Homepage
Route::get('/generate-surat-keterangan-masuk/{transaction_id}', [SuratController::class, 'generate_masuk']);
Route::get('/generate-surat-keterangan-keluar/{transaction_id}', [SuratController::class, 'generate_keluar']);

Route::get('/', [FrontendsController::class, "homepage"]); // homepage
Route::get('/room/{slug}', [FrontendsController::class, "showkamar"]); //Show Kamar
Route::get('show-all-room',[FrontendsController::class, "showAllKamar"]); //Show all kamar
Route::get('filter-kamar',[FrontendsController::class, "filterKamar"]); //Filter kamar
Route::get('kost',[FrontendsController::class, "showByKota"]); // show kamar by kota

Route::get('simpan/kamar', [FrontendsController::class, "simpanKamar"]); // proses simpan kamar (favorite)
Route::get('hapus/kamar',[FrontendsController::class, "hapusKamar"]); // proses hapus kamar (favorite)

Route::middleware('auth')->group(function () {
  Route::get('/home', [HomeController::class, "index"]);

  Route::get('rekening/update', [BankController::class, "rekeningUpdate"]); // Rekening Update
  Route::get('is-active-bank', [BankController::class, "IsActiveBank"]); // Aktifkan dan Non Aktifkan Bank

  ////// ADMIN \\\\\\\
  Route::prefix('/admin')->middleware('role:Admin')->group(function () {
    Route::resources([
        '/admin-kamar' => AdminController::class
    ]);

    Route::get('status-kamar', [AdminController::class, "statusKamar"]);
  });

  ////// PEMILIK \\\\\\
  Route::prefix('pemilik')->middleware('role:Pemilik')->group(function () {
  
    Route::resource('kamar', KamarController::class); //Data Kamar
    Route::get('/room/{key}/detail', [KamarController::class, "detail"]); //Data Kamar
    Route::get('is-aktif-kamar', [KamarController::class, "statusKamar"]);
    Route::patch('verifikasi-form-in/{transaction_id}', [KamarController::class, "verifikasiFormIn"]);
    Route::patch('verifikasi-form-out/{transaction_id}', [KamarController::class, "verifikasiFormOut"]);
    Route::prefix('delete')->group(function(){
      Route::get('fasilitas-kamar/{id}', [KamarController::class, "delFasilitasKamarService"]);
      Route::get('fasilitas-kamar-mandi/{id}', [KamarController::class, "delFasilitasKamarMandiService"]);
      Route::get('fasilitas-parkir/{id}', [KamarController::class, "delFasilitasParkirService"]);
      Route::get('area/{id}', [KamarController::class, "delAreaService"]);
      Route::get('foto-kamar/{foto_kamar}', [KamarController::class, "delFotoKamarService"]);
    });

    // Penghuni
    Route::get('/download/{type}/{id}', [UserDocumentController::class, 'download'])->name('user.document.download');
    Route::post('/update-verified/{id}', [UserVerificationController::class, 'update'])->name('update.verified');

    Route::get('promo', [PromoController::class, "promo"])->name('kamar.promo'); // Promo Kamar Index
    Route::get('promo/create', [PromoController::class, "promoCreate"])->name('kamar.promo.create'); // Promo Kamar Create
    Route::post('promo/store', [PromoController::class, "promoProces"])->name('kamar.promo.store'); // Promo Kamar Proses
    Route::get('promo/inactive-promo', [PromoController::class, "inactivePromo"])->name('kamar.promo.inactive'); // InActive Promo
    Route::get('promo/edit/{id}', [PromoController::class, "promoEdit"])->name('kamar.promo.edit'); // Promo Edit
    Route::put('promo/update/{id}', [PromoController::class, "promoUpdate"])->name('kamar.promo.update'); // Promo Edit

    Route::post('rekening', [BankController::class, "rekening"]); // Rekening
    Route::post('testimoni', [ProfileController::class, "testimoni"]);

    Route::get('booking-list', [BookListController::class, "index"])->name('booking-list'); // Booking List
    Route::get('room/{key}',[BookListController::class, "confirm_payment"]); // Confirm payment from user
    Route::put('payment-confirm/{key}', [BookListController::class, "proses_confirm_payment"]); // Proses Confirm Payment
    Route::get('reject-payment', [BookListController::class, "reject_confirm_payment"]); // Reject Payment
    Route::get('penghuni', [PenghuniController::class, "penghuni"]); // Penghuni
    Route::get('penghuni/{id}/detail', [PenghuniController::class, "detail"]); // Penghuni
    Route::get('done-sewa', [BookListController::class, "doneSewa"]); // Done Sewa
  });


  ///// USER \\\\\
  Route::prefix('/user')->middleware('role:Pencari')->group(function () {
    Route::post('/transaction-room/{id}', [TransactionController::class, "store"])->name('sewa.store'); // Proses save Room
    Route::get('room/{key}', [TransactionController::class, "detail_payment"]); // Detail payment
    Route::put('konfirmasi-payment/{id}', [TransactionController::class, "update"]); // Konfirmasi Payment
    Route::get('tagihan', [TransactionController::class, "tagihan"]); // Ambil data tagihan
    Route::get('myroom', [MyRoomsController::class, "myroom"]); // Kamar aktif
    Route::get('history', [TransactionController::class, "history"]); // Kamar aktif
    Route::get('review/{key}', [MyRoomsController::class, "review"]); // Review Kamar
    Route::post('review-proses/{key}', [MyRoomsController::class, "reviewProses"]); // Review Kamar

    Route::get('/proses-in-kondisi/{transaction_id}', [RoomConditionController::class, "formMasuk"]);
    Route::post('/proses-in-kondisi/{transaction_id}', [RoomConditionController::class, "storeMasuk"]);
    
    Route::get('/proses-out-kondisi/{transaction_id}', [RoomConditionController::class, "formKeluar"]);
    Route::post('/proses-out-kondisi/{transaction_id}', [RoomConditionController::class, "storeKeluar"]);
  });

  ////// GLOBAL ROUTE \\\\\\
  Route::get('profile',[GlobalController::class, "profile"]);
  Route::put('profile/{id}', [GlobalController::class, "profileUpdate"]);
});

