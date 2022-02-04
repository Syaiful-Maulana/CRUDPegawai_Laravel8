
@extends('layouts.app')

@section('title', 'pegawai')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('assets/toastr/build/toastr.css')}}">
@endpush

@section('content')
<div class="page-title-area">
  <div class="row align-items-center">
      <div class="col-sm-12 mb-3 mt-3">
          <div class="breadcrumbs-area clearfix">
              <h4 class="page-title pull-left">Tambah Data Pegawai</h4>
              <ul class="breadcrumbs pull-right">
                  <li><a href="{{ url('dashboard')}}">Dashboard</a></li>
                  <li><a href="{{ url('pegawai')}}">Data Pegawai</a></li>
                  <li class="breadcrumb-item active">Tambah Data</li>
              </ul>
          </div>
      </div>
  </div>
</div>
<div class="content-wrapper mb-5 mt-3">
  <div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('prosesData')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Masukkan Foto</label>
                      <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" >
                      @error('foto')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" >
                      @error('nama')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">NIP</label>
                      <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" >
                      @error('nip')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Tanggal Lahir</label>
                      <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" >
                      @error('tanggal')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Alamat</label>
                      <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" >
                      @error('alamat')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div> 
                    <div class="mb-3">
                      <label class="form-label">Jenis Kelamin</label>
                      <select class="form-select @error('jenisKelamin') is-invalid @enderror" name="jenisKelamin" aria-label="Default select example">
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      </option>
                      @error('jenisKelamin')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Email</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" >
                      @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div> 
                    <div class="mb-3">
                      <label class="form-label">No Telephon</label>
                      <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" >
                      @error('no_hp')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Kendaraan</label>
                      <input type="text" name="kendaraan" class="form-control @error('kendaraan') is-invalid @enderror" >
                      @error('kendaraan')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div> 
                    <div class="mb-3">
                      <label  class="form-label">Plat Nomor Kendaraan</label>
                      <input type="text" name="plat" class="form-control @error('plat') is-invalid @enderror" >
                      @error('plat')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div> 
                    <button type="submit" class="btn btn-primary">Kirim</button>
                  </form>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
