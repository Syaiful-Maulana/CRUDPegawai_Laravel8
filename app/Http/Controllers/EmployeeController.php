<?php

namespace App\Http\Controllers;
// use Maatwebsite\Excel\Facedes\Excel;
use Excel;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use App\Models\Employee;
use App\Models\Religion;
// use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Employee::where('nama','LIKE', '%'.$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());

        }else{

            $data = Employee::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        // return $data;
        return view('Employee.index', compact('data')) ;
    }
    public function tambahPegawai()
    {
        $data = Employee::all();
        return view('Employee.tambahData', compact('data'));
    }
    public function prosesData(Request $request)
    {
        // dd($request->all());
        // $this->validate( $request, [
        //     'nama' => 'required|min:5|max:20',
        //     'jenisKelamin' => 'required',
        //     'notelpon' => 'required|min:11|max:12',
        //     'foto' => 'required',
        // ],
        // [
        //     'nama.required' => 'Nama tidak boleh kosong',
        //     'jenisKelamin.required' => 'Jenis Kelamin tidak boleh kosong',
        //     'notelpon.required' => 'No Telepon tidak boleh kosong',
        //     'foto.required' => 'Foto tidak boleh kosong',
        // ]);
        $data = Employee::create($request->all());
        // tambah foto
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoPegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('pegawai')->with('success', 'Data Berhasil Di Tambahkan');
    }
    public function editData($id)
    {
        $data = Employee::find($id);
        // return $data;
        return view('Employee.edit', compact('data'));
    }
    public function prosesEdit(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'nama' => 'required|min:2',
        //     'jenisKelamin' => 'required',
        //     'notelpon' => 'required',
        // ],
        // [
        //     'nama.required' => 'Nama tidak boleh kosong',
        //     'jenisKelamin.required' => 'Jenis Kelamin tidak boleh kosong',
        //     'notelpon.required' => 'No Telepon tidak boleh kosong',
        // ]);
        $data = Employee::find($id);
        $data->update($request->all());
        if(Session('halaman_url')){
            return redirect(Session('halaman_url'))->with('success', 'Data Berhasil Di Update');
        }
        return redirect('pegawai')->with('success', 'Data Berhasil Di Update');
    }
    public function delete($id)
    {
        $data = Employee::find($id);
        $data->delete();
        if(Session('halaman_url')){
            return redirect(Session('halaman_url'))->with('success', 'Data Berhasil Di Hapus');
        }
        return redirect('pegawai')->with('success', 'Data Berhasil Di Hapus');
    }

    public function exportPDF()
    {
        $data = Employee::all();
        view()->share('data', $data);
        $pdf = PDF::loadView('Employee.datapegawai-pdf', $data);
        // $pdf = PDF::loadview('Employee.datapegawai-pdf');
        return $pdf->download('data.pdf');
    }
    public function exportExcel()
    {
        return Excel::download(new EmployeeExport, 'datapegawai.xlsx');
    }
    public function importExcel(Request $request)
    {
        $data = $request->file('file');
        $namaFile = $data->getClientOriginalName();
        $data->move('EmployeeData', $namaFile);

        Excel::import(new EmployeeImport, \public_path('/EmployeeData/'.$namaFile));
        return redirect()->back();
    }
}
