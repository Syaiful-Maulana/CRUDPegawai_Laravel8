<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('assets/toastr/build/toastr.css')}}">
@extends('main')

@section('title', 'pegawai')

@section('content')
<div class="content-wrapper mb-5">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2" >
        <div class="col-sm-12">
          <h1 class="text-center">Tambah Data Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('pegawai')}}">Data Pegawai</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('prosesData')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label  class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" >
                      @error('nama')
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
                      <label class="form-label">Agama</label>
                      <select class="form-select @error('id_religions') is-invalid @enderror" name="id_religions" aria-label="Default select example">
                        <option selected>Pilih Jenis Agama</option>
                        @foreach ($dataagama as $data)
                        <option value="{{ $data->id}}">{{ $data->nama}}</option>
                            
                        @endforeach
                      </select>
                      </option>
                      @error('jenisKelamin')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label  class="form-label">Tanggal Lahir</label>
                      <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" >
                      @error('tanggal_lahir')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label">No Telephon</label>
                      <input type="number" name="notelpon" class="form-control @error('notelpon') is-invalid @enderror" >
                      @error('notelpon')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Masukkan Foto</label>
                      <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" >
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
