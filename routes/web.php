<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes([
    'register' => false, 
    'reset' => false, 
    'verify' => false, 
  ]);

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/datakelas/index', [ClasController::class, 'index'])->name('indexKelas');
Route::post('/datakelas/post', [ClasController::class, 'store'])->name('storeKelas');
Route::post('/datakelas/edit', [ClasController::class, 'edit'])->name('editKelas');
Route::post('/datakelas/update', [ClasController::class, 'update'])->name('updateKelas');
Route::get('/datakelas/delete/{id}', [ClasController::class, 'destroy'])->name('destroyKelas');

Route::get('/datamateri/index', [MaterialController::class, 'index'])->name('indexMateri');
Route::post('/datamateri/post', [MaterialController::class, 'store'])->name('storeMateri');
Route::post('/datamateri/edit', [MaterialController::class, 'edit'])->name('editMateri');
Route::post('/datamateri/update', [MaterialController::class, 'update'])->name('updateMateri');
Route::get('/datamateri/delete/{id}', [MaterialController::class, 'destroy'])->name('destroyMateri');

Route::get('/dataasisten/index', [AssistantController::class, 'index'])->name('indexAsisten');
Route::post('/dataasisten/post', [AssistantController::class, 'store'])->name('storeAsisten');
Route::post('/dataasisten/edit', [AssistantController::class, 'edit'])->name('editAsisten');
Route::post('/dataasisten/update', [AssistantController::class, 'update'])->name('updateAsisten');
Route::get('/dataasisten/destroy/{id}', [AssistantController::class, 'destroy'])->name('destroyAsisten');
Route::get('/user/profile/{id}',  [AssistantController::class, 'editProfile'])->name('editProfile');


Route::get('/generator/index', [CodeController::class, 'index'])->name('indexKode');
Route::post('/generator/post', [CodeController::class, 'store'])->name('storeKode');


Route::post('/absen/post', [AttendanceController::class, 'store'])->name('storeAbsen');
Route::post('/absen/update', [AttendanceController::class, 'update'])->name('updateAbsen');


Route::get('/riwayat/index', [ReportController::class, 'index'])->name('indexRiwayat');
Route::get('/riwayat/report', [ReportController::class, 'report'])->name('reportRiwayat');
Route::post('/riwayat/cari', [ReportController::class, 'search'])->name('searchRiwayat');



