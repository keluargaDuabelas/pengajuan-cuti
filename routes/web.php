<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisCutiController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/login');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('back.app');
});


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Tambahkan route lain yang memerlukan autentikasi di sini
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth'])->group(function () {

    Route::get('filter', [ReportController::class, 'filter'])->name('filter.index');
    Route::get('export', [ReportController::class, 'export'])->name('export.export');

});
Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'jenis-cuti' => JenisCutiController::class,
    'pengajuan' => PengajuanController::class,



]);
