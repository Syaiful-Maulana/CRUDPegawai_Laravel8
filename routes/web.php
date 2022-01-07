<?php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReligionController;
use App\Models\Employee;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/postRegister', [LoginController::class, 'postRegister'])->name('postRegister');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/', function () {
        $jumlahPegawai = Employee::count();
        $jumlahPegawaiLakilaki = Employee::where('jenisKelamin', 'Laki - Laki')->count();
        $jumlahPegawaiPerempuan = Employee::where('jenisKelamin', 'Perempuan')->count();
        return view('home', compact('jumlahPegawai','jumlahPegawaiLakilaki','jumlahPegawaiPerempuan'));
    });

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