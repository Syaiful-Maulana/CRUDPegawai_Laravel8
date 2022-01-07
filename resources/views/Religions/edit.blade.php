<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('assets/toastr/build/toastr.css')}}">
@extends('main')

@section('title', 'pegawai')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2" >
        <div class="col-sm-6">
          <h1 class="m-0">Data Agama</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('religion')}}">Data Agama</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('religion/' .$religion->id)}}" method="POST">
                  @method('PUT')
                    @csrf
                    <div class="mb-3">
                      <label  class="form-label">Nama</label>
                      <input type="text" name="nama"  autocomplete="off" class="form-control @error('nama') is-invalid @enderror" value="{{ $religion->nama}}">
                      @error('nama')
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
