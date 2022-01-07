@extends('main')

@section('title', 'Religions')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('assets/toastr/build/toastr.css')}}">
@endpush

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2" >
        <div class="col-sm-12">
          <h1 class="text-center">Religions</h1>
        </div><!-- /.col -->
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
            <li class="breadcrumb-item active">Religions</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  
  <div class="container">
    <a href="{{ url('religion/create')}}" type="button" class="btn btn-success mb-3"><i class="fas fa-plus-square"></i> Tambah</a>

    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama Agama</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $index=> $row)
                <tr>
                    <th scope="row">{{  $index + $data->firstItem()}}</th>
                    <td>{{ $row->nama}}</td>
                    <td>
                        <a href="{{ url('religion/' .$row->id .'/edit')}}" type="button" class="btn btn-info">Edit</a>
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

@push('scripts')
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/toastr/toastr.js')}}"></script>

  <script>
  $('.delete').click(function(){
    var agamaid = $(this).attr('data-id');
    var nama = $(this).attr('data-nama');
    swal({
        title: "Yakin ?",
        text: "Kamu akan menghapus data agama dengan nama agama " + nama+ " ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
      .then((willDelete) => {
        if (willDelete) {
        window.location = "/delete1/" + agamaid+ ""
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