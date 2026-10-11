<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MahasiswaController;
// Route dengan closure (inline function)
Route::get('/', function () {
 return view('welcome');
});
// Route dengan parameter
Route::get('/halo/{nama}', function (string $nama) {
 return "Halo, {$nama}! Selamat datang di praktikum Laravel.";
});

// Route ke controller methods
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show']);
Route::get('/mahasiswa/create/form', [MahasiswaController::class, 'create']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
 ->middleware('log.request');


// Route dengan parameter opsional
Route::get('/kampus/{nama?}', function (string $nama = 'Universitas') {
 return "Selamat datang di {$nama}";
});

Route::post('/mahasiswa', function (Request $request) {
 // Untuk sementara, hanya menampilkan data yang dikirim
 return response()->json([
 'message' => 'Data mahasiswa berhasil diterima',
 'data' => [
 'nim' => $request->input('nim'),
 'nama' => $request->input('nama'),
 'jurusan' => $request->input('jurusan'),
 ]
 ]);
});