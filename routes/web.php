<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

Route::get('spk-btn/login', [AuthController::class, 'showLogin']);
Route::post('spk-btn/login', [AuthController::class, 'LoginProcess']);
Route::get('logout', [AuthController::class, 'Logout']);

Route::group(['middleware'=>['auth']], function(){
	Route::group(['middleware'=>['CheckLogin:0']], function(){
		Route::prefix('Admin')->group(function(){
			Route::get('beranda', [AdminController::class, 'Beranda']);

			Route::get('user-admin', [UserController::class,'BerandaUserAdmin']);
			Route::get('user-admin/create', [UserController::class,'CreateUserAdmin']);
			Route::post('user-admin', [UserController::class, 'storeUserAdmin']);
			Route::get('user-admin/edit/{user}', [UserController::class,'editUserAdmin']);

			Route::get('profil', [UserController::class, 'Profil']);
			Route::get('ganti-password/{user}', [UserController::class,'gantipasswordUserAdmin']);
			Route::post('ganti-password', [UserController::class,'simpanpassword']);

			Route::get('user-karyawan', [UserController::class,'BerandaUserKaryawan']);
			Route::get('user-karyawan/create', [UserController::class,'CreateUserKaryawan']);
			Route::post('user-karyawan', [UserController::class, 'storeUserKaryawan']);

			Route::get('nasabah', [NasabahController::class,'BerandaNasabah']);
			Route::get('nasabah/create', [NasabahController::class,'CreateNasabah']);

			Route::get('kriteria', [KriteriaController::class,'BerandaKriteria']);
			Route::get('kriteria/create', [KriteriaController::class,'CreateKriteria']);
			Route::post('kriteria', [KriteriaController::class, 'store']);
			Route::get('kriteria/edit/{kriteria}', [KriteriaController::class,'edit']);
			Route::put('kriteria/edit/{kriteria}', [KriteriaController::class,'update']);
			Route::delete('kriteria/{kriteria}', [KriteriaController::class, 'destroy']);
			Route::get('perhitungan-kriteria', [KriteriaController::class, 'berandaperhitungan']);
			Route::get('perhitungan-kriteria/create', [KriteriaController::class, 'tambahperhitungan']);
			Route::post('perhitungan-kriteria', [KriteriaController::class, 'perhitungan']);

			Route::get('sub-kriteria', [SubKriteriaController::class,'BerandaSubKriteria']);
			Route::get('sub-kriteria/create/{kriteria}', [SubKriteriaController::class,'createSubKriteria']);
			Route::post('sub-kriteria', [SubKriteriaController::class, 'store']);
			Route::get('sub-kriteria/edit/{subkriteria}', [SubKriteriaController::class, 'edit']);
			Route::put('sub-kriteria/edit/{subkriteria}', [SubKriteriaController::class, 'update']);
			Route::delete('sub-kriteria/{subkriteria}', [SubkriteriaController::class, 'destroy']);
			Route::get('perhitungan-sub-kriteria', [SubkriteriaController::class, 'perhitungan']);

			Route::get('klasifikasi', [KlasifikasiController::class,'BerandaKlasifikasi']);
			Route::get('klasifikasi/create', [KlasifikasiController::class,'createklasifikasi']);

			Route::get('pendukungkeputusan', [PendukungKeputusanController::class,'Berandapendukungkeputusan']);
			Route::get('pendukungkeputusan/create', [PendukungKeputusanController::class,'creatependukungkeputusan']);
		});
	});
});

Route::group(['middleware'=>['auth']], function(){
	Route::group(['middleware'=>['CheckLogin:1']], function(){
		Route::prefix('spk-btn')->group(function(){
			Route::get('beranda', [AdminController::class, 'Beranda']);

			Route::get('nasabah', [NasabahController::class,'BerandaNasabah']);
			Route::get('nasabah/create', [NasabahController::class,'CreateNasabah']);

			Route::get('kriteria', [KriteriaController::class,'BerandaKriteria']);
			Route::get('kriteria/create', [KriteriaController::class,'CreateKriteria']);
			Route::post('kriteria', [KriteriaController::class, 'store']);

			Route::get('sub-kriteria', [SubKriteriaController::class,'BerandaSubKriteria']);
			Route::get('sub-kriteria/create/{kriteria}', [SubKriteriaController::class,'createSubKriteria']);

			Route::get('klasifikasi', [KlasifikasiController::class,'BerandaKlasifikasi']);
			Route::get('klasifikasi/create', [KlasifikasiController::class,'createklasifikasi']);

			Route::get('pendukungkeputusan', [PendukungKeputusanController::class,'Berandapendukungkeputusan']);
			Route::get('pendukungkeputusan/create', [PendukungKeputusanController::class,'creatependukungkeputusan']);
		});
	});
});