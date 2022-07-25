<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManifestController;
use App\Http\Controllers\ManifestDetailController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\GajikaryawanController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\TransaksiDebitKreditController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\AddressController;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\TarifKirimController;
use App\Http\Controllers\OriginController;
use App\Http\Controllers\TarifptigaController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\DataPengirimanPaketController;
use App\Http\Controllers\PengirimanTrackingmoreController;
use App\Http\Controllers\TypepaketController;
use App\Http\Controllers\TarifInternasionalController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PengirimanptigaController;
use App\Http\Controllers\TrackingPtigaController;

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

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home2', [HomeController::class, 'index2'])->name('home2');
Route::get('/home3', [HomeController::class, 'index3'])->name('home3');

Route::group(['middleware' => ['auth']], function() {




    Route::resource('roles', RoleController::class);
    Route::get('roles/delete/{id}', [RoleController::class, 'destroy'])->name('roles.delete');
    Route::resource('users', UserController::class);
    Route::get('users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
    Route::get('edit_profil/{id}', [UserController::class, 'edit_profil'])->name('users.edit_profil');
    Route::post('update_profil/{id}', [UserController::class, 'update_profil'])->name('users.update_profil');


    //Route::resource('karyawan', KaryawanController::class);
    //Route::get('karyawan/delete/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.delete');
    Route::resource('client', ClientController::class);
    Route::get('client/delete/{id}', [ClientController::class, 'destroy'])->name('client.delete');

    Route::resource('invoice', InvoiceController::class);
    Route::get('invoice/delete/{id}', [InvoiceController::class, 'destroy'])->name('invoice.delete');
    Route::get('invoice/print/{id}', [InvoiceController::class, 'print'])->name('invoice.print');

    Route::resource('invoice-detail', InvoiceDetailController::class);
    Route::get('invoice-detail/delete/{id}', [InvoiceDetailController::class, 'destroy'])->name('invoice-detail.delete');

    Route::resource('origin', OriginController::class);
    Route::get('origin/delete/{id}', [OriginController::class, 'destroy'])->name('origin.delete');

    Route::resource('tarif', TarifKirimController::class);
    Route::get('tarif/delete/{id}', [TarifKirimController::class, 'destroy'])->name('tarif.delete');
    Route::post('tarif-filterbykecamatan', [TarifKirimController::class, 'filterbykecamatan'])->name('tarif.filterbykecamatan');

    //pengiriman raja ongkir
    Route::resource('tarif-rajao', TarifptigaController::class);
    Route::get('tarif-rajao/delete/{id}', [TarifptigaController::class, 'destroy'])->name('tarif-rajao.delete');
    Route::get('/cities/{province_id}', [TarifptigaController::class, 'getCities']);
    Route::get('/getpengirim', [PengirimanptigaController::class, 'getClient']);
    Route::get('/getpengirim/{pengirim_id}', [PengirimanptigaController::class, 'getClientbyid']);

    Route::resource('pengiriman-rajao', PengirimanptigaController::class);
    Route::get('pengiriman-rajao-filter', [PengirimanptigaController::class, 'filter'])->name('pengiriman-rajao.filter');
    Route::get('pengiriman-rajao/delete/{id}', [PengirimanptigaController::class, 'destroy'])->name('pengiriman-rajao.delete');
    Route::get('pengiriman-rajao/print/{id}', [PengirimanptigaController::class, 'print'])->name('pengiriman-rajao.print');
    Route::get('pengiriman-rajao/show/{id}', [PengirimanptigaController::class, 'show'])->name('pengiriman-rajao.show');

    Route::resource('pengiriman-rajao-tracking', TrackingPtigaController::class);
    Route::get('pengiriman-rajao/resi', [TrackingPtigaController::class, 'getResi']);
    Route::get('pengiriman-rajao-tracking/delete/{id}', [TrackingPtigaController::class, 'destroy'])->name('pengiriman-rajao-tracking.delete');


    Route::get('gajikaryawan/cetakpdf', [GajikaryawanController::class, 'cetakpdf'])->name('gajikaryawan.cetakpdf');
    Route::get('gajikaryawan/reportpdf', [GajikaryawanController::class, 'reportpdf'])->name('gajikaryawan.reportpdf');
    Route::resource('gajikaryawan', GajikaryawanController::class);
    Route::get('gajikaryawan/delete/{id}', [GajikaryawanController::class, 'destroy'])->name('gajikaryawan.delete');
    Route::resource('bonus', BonusController::class);
    Route::get('bonus/delete/{id}', [BonusController::class, 'destroy'])->name('bonus.delete');
   
    Route::resource('debitkredit', TransaksiDebitKreditController::class);
    Route::get('debitkredit/delete/{id}', [TransaksiDebitKreditController::class, 'destroy'])->name('debitkredit.delete');
    Route::get('debitkredit-harian/reportpdf', [TransaksiDebitKreditController::class, 'reportpdfharian'])->name('debitkredit-harian.reportpdf');
    Route::get('debitkredit-bulanan/reportpdf', [TransaksiDebitKreditController::class, 'reportpdfbulanan'])->name('debitkredit-bulanan.reportpdf');


    Route::resource('manifest', ManifestController::class);
    Route::get('manifest/delete/{id}', [ManifestController::class, 'destroy'])->name('manifest.delete');
    Route::get('manifest/print/{id}', [ManifestController::class, 'print'])->name('manifest.print');
    
    Route::resource('manifest-detail', ManifestDetailController::class);
    Route::get('manifest-detail/delete/{id}', [ManifestDetailController::class, 'destroy'])->name('manifest-detail.delete');

    
    // Route::get('cargo/input-pengiriman', [CargoController::class, 'indexInputPengiriman'])->name('cargo.inputpengiriman');
    // Route::post('cargo/input-pengiriman', [CargoController::class, 'save'])->name('cargo.savePengiriman');
    // Route::get('cargo-filter', [CargoController::class, 'filter'])->name('cargo.filter');
    Route::get('cargo/update-posisi', [CargoController::class, 'indexUpdatePosisi'])->name('cargo.updatePosisi');
    Route::post('cargo/update-posisi', [DataPengirimanPaketController::class, 'savePosisi'])->name('cargo.saveUpdatePosisi');

    Route::get('cargo/resi', [CargoController::class, 'getResi']);

    Route::resource('datapengiriman', DataPengirimanPaketController::class);
    Route::get('datapengiriman-filter', [DataPengirimanPaketController::class, 'index'])->name('datapengiriman.filter');
    Route::get('datapengiriman/delete/{id}', [DataPengirimanPaketController::class, 'destroy'])->name('datapengiriman.delete');
    Route::get('datapengiriman/print/{id}', [DataPengirimanPaketController::class, 'print'])->name('datapengiriman.print');
    Route::get('datapengiriman/show/{id}', [DataPengirimanPaketController::class, 'show'])->name('datapengiriman.show');
    // Route::get('datapengiriman/update-posisi', [DataPengirimanPaketController::class, 'indexUpdatePosisi'])->name('datapengiriman.updatePosisi');
    // Route::post('datapengiriman/update-posisi', [DataPengirimanPaketController::class, 'savePosisi'])->name('datapengiriman.saveUpdatePosisi');
    // address
    Route::get('address/provinces', [AddressController::class, 'getProvinces'])->name('address.provinces');
    Route::get('address/cities/{id}', [AddressController::class, 'getCities'])->name('address.cities');
    Route::get('address/districts/{id}', [AddressController::class, 'getDistricts'])->name('address.districts');
    Route::get('address/villages/{id}', [AddressController::class, 'getVillages'])->name('address.villages');
    //landingpage
    Route::resource('galery', GaleryController::class);
    Route::get('galery/delete/{id}', [GaleryController::class, 'destroy'])->name('galery.delete');

    //pengiriman internasional
    Route::resource('pengiriman-trakingmore', PengirimanTrackingmoreController::class);
    Route::get('pengiriman-trakingmore/filter', [PengirimanTrackingmoreController::class, 'filter'])->name('pengiriman-trakingmore.filter');
    Route::get('pengiriman-trakingmore/delete/{id}', [PengirimanTrackingmoreController::class, 'destroy'])->name('pengiriman-trakingmore.delete');
    Route::get('pengiriman-trakingmore/print/{id}', [PengirimanTrackingmoreController::class, 'print'])->name('pengiriman-trakingmore.print');
    Route::get('pengiriman-trakingmore/show/{id}', [PengirimanTrackingmoreController::class, 'show'])->name('pengiriman-trakingmore.show');

    Route::post('cek-trakingmore', [PengirimanTrackingmoreController::class, 'tracking'])->name('cek-trakingmore.tracking');
    Route::get('cek-trakingmore', [PengirimanTrackingmoreController::class, 'tracking'])->name('cek-trakingmore.tracking');

    Route::resource('typepaket', TypepaketController::class);
    Route::get('typepaket/delete/{id}', [TypepaketController::class, 'destroy'])->name('typepaket.delete');

    Route::resource('country', CountryController::class);
    Route::get('country/delete/{id}', [CountryController::class, 'destroy'])->name('country.delete');

    Route::resource('tarifin', TarifInternasionalController::class);
    Route::get('tarifin/delete/{id}', [TarifInternasionalController::class, 'destroy'])->name('tarifin.delete');
    Route::get('getCourier', [TarifInternasionalController::class, 'getCourier']);
});

Route::get('autocomplete-pengawai', [UserController::class, 'autocomplete'])->name('autocomplete-pengawai');
Route::get('autocomplete-asal', [TarifKirimController::class, 'asal'])->name('autocomplete-asal');
Route::post('cekongkir', [FrontController::class, 'cekongkir'])->name('cekongkir');
Route::post('tracking', [FrontController::class, 'tracking'])->name('tracking');
Route::get('tracking', [FrontController::class, 'beranda']);
Route::get('cekongkir', [FrontController::class, 'beranda']);


Route::get('/',[FrontController::class,'beranda'])->name('beranda');

Route::get('/ongkir', [TarifptigaController::class, 'check_ongkir']);
