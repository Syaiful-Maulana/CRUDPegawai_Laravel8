<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');
Route::group(['middleware' => ['auth']], function (){
Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
Route::get('/tambahPegawai', [EmployeeController::class, 'tambahPegawai'])->name('tambahPegawai');
Route::post('/prosesData', [EmployeeController::class, 'prosesData'])->name('prosesData');
Route::get('/editData/{id}', [EmployeeController::class, 'editData'])->name('editData');
Route::post('/prosesEdit/{id}', [EmployeeController::class, 'prosesEdit'])->name('prosesEdit');
Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');

// export pdf
Route::get('/exportPDF', [EmployeeController::class, 'exportPDF'])->name('exportPDF');
// export excel
Route::get('/exportExcel', [EmployeeController::class, 'exportExcel'])->name('exportExcel');
Route::post('/importExcel', [EmployeeController::class, 'importExcel'])->name('importExcel');

// Agama
Route::resource('religion', ReligionController::class);
Route::get('/delete1/{id}', [ReligionController::class, 'delete'])->name('delete');
});
require __DIR__.'/auth.php';
