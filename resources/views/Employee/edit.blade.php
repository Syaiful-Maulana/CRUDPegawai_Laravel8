<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('assets/toastr/build/toastr.css')}}">
@extends('main')

@section('title', 'pegawai')

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
<div class="content-wrapper">
  <div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('prosesEdit/' .$data->id)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label  class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $data->nama}}">
                      @error('nama')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">NIP</label>
                      <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ $data->nip}}">
                      @error('nip')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Jenis Kelamin</label>
                      <select name="jenisKelamin" class="form-control @error('jenisKelamin') is-invalid @enderror"  aria-label="Default select example">
                        <option selected value="{{ $data->jenisKelamin}}">{{ $data->jenisKelamin}}</option>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      </option>
                      @error('jenisKelamin')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>


                    <div class="mb-3">
                      <label class="form-label">No Telephon</label>
                      <input type="number" name="notelpon" class="form-control @error('notelpon') is-invalid @enderror"  value="{{ $data->notelpon}}">
                      @error('notelpon')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label  class="form-label">Tanggal Lahir</label>
                      <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ $data->tanggal_lahir}}" >
                      @error('tanggal_lahir')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Masukkan Foto</label>
                      <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"  value="{{ $data->foto}}" >
                      @error('foto')
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
