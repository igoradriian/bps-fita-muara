<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,DashboardController,MaterialController,AttendanceController,ProfileController,AdminController};
Route::middleware('guest')->group(function () {
 Route::get('/login',[AuthController::class,'login'])->name('login');
 Route::post('/login',[AuthController::class,'authenticate'])->name('login.submit')->middleware('throttle:8,1');
 Route::get('/register',[AuthController::class,'register'])->name('register');
 Route::post('/register',[AuthController::class,'store'])->name('register.submit')->middleware('throttle:8,1');
});
Route::middleware('auth')->group(function () {
 Route::get('/',[DashboardController::class,'index'])->name('dashboard');
 Route::post('/logout',[AuthController::class,'logout'])->name('logout');
 Route::get('/materi',[MaterialController::class,'index'])->name('materi');
 Route::get('/materi/{material}',[MaterialController::class,'show'])->name('materi.show');
 Route::post('/materi/{material}/selesai',[MaterialController::class,'complete'])->name('materi.complete');
 Route::get('/absensi',[AttendanceController::class,'index'])->name('absensi');
 Route::post('/absensi/{session}',[AttendanceController::class,'store'])->name('absensi.store');
 Route::get('/riwayat',[AttendanceController::class,'history'])->name('riwayat');
 Route::get('/profil',[ProfileController::class,'index'])->name('profil');
 Route::put('/profil',[ProfileController::class,'update'])->name('profil.update');
 Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
  Route::get('/',[AdminController::class,'index'])->name('index');
  Route::post('/kegiatan',[AdminController::class,'storeSession'])->name('kegiatan.store');
  Route::get('/laporan.csv',[AdminController::class,'export'])->name('export');
 });
});
