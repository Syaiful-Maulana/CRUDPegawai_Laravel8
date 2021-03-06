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
              <h4 class="page-title pull-left">Data Pegawai</h4>
              <ul class="breadcrumbs pull-right">
                  <li><a href="index.html">Home</a></li>
                  <li><span>Pegawai</span></li>
              </ul>
          </div>
      </div>
  </div>
</div>
<div class="content-wrapper">
  
  <div class="container">
    <a href="{{ url('tambahPegawai')}}" type="button" class="btn btn-success mb-3 mt-3"><i class="fas fa-plus-square"></i> Tambah</a>
    <div class="row g-3 align-items-center">
      <div class="col-auto">
        <form action="{{url('pegawai')}}" method="GET">
        <input type="search" name="search" class="form-control" aria-describedby="passwordHelpInline">
        </form>
      </div>
      <div class="col-auto">
        <a href="{{ url('exportPDF')}}" type="button" class="btn btn-info"><i class="fas fa-file-export"></i> Export PDF</a>
      </div>
      <div class="col-auto">
        <a href="{{ url('exportExcel')}}" type="button" class="btn btn-success"><i class="fas fa-file-export"></i> Export Excel</a>
      </div>
      <div class="col-auto">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fas fa-file-import"></i> Import Data
        </button>   
      </div>
  
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('importExcel')}}" method="POST" enctype="multipart/form-data">
              @csrf
  
              <div class="modal-body">
                <div class="form-group">
                  <input type="file" name="file" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  
   </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">NIP</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Email</th>
                <th scope="col">No Telphon</th>
                <th scope="col">Kendaraan</th>
                <th scope="col">Plat Nomor</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $row)
                <tr>
                    <th scope="row">{{ $index + $data->firstItem()}}</th>
                    <td>
                      <img src="{{ asset('fotoPegawai/'.$row->foto)}}" style="width: 60px;" alt="">
                    </td>
                    <td>{{ $row->nama}}</td>
                    <td>{{ $row->nip}}</td>
                    <td>{{ $row->tanggal}}</td>
                    <td>{{ $row->alamat}}</td>
                    <td>{{ $row->jeniskelamin}}</td>
                    <td>{{ $row->email}}</td>
                    <td>0{{ $row->no_hp}}</td>
                    <td>{{ $row->kendaraan}}</td>
                    <td>{{ $row->plat}}</td>
                    <td>
                        <a href="{{ url('editData/' .$row->id)}}" type="button" class="btn btn-info">Edit</a>
                        <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $row->id}}" data-nama="{{ $row->nama}}">Delete</a>        
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{ $data->links() }}
    </div>
  </div>
</div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/toastr/toastr.js')}}"></script>
<script>
  $('.delete').click(function(){
    var pegawaiid = $(this).attr('data-id');
    var nama = $(this).attr('data-nama');
    swal({
        title: "Yakin ?",
        text: "Kamu akan menghapus data pegawai dengan id " + nama+ " ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
      .then((willDelete) => {
        if (willDelete) {
        window.location = "/delete/" + pegawaiid+""
          swal("Data Berhasil Dihapus", {
            icon: "success",
          });
        } else {
          swal("Data Tidak Jadi Dihapus");
        }
    });
  });
  
  </script>
  
  <script>
  @if(Session::has('success'))   
  toastr.success('{{Session::get('success')}}')
  @endif
  </script>
@endpush