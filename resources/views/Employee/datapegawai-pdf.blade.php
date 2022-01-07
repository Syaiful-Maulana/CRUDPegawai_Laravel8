<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1 class="text-center">Data Pegawai</h1>

<table id="customers">
    <tr>
        <th scope="col">NO</th>
        <th scope="col">Nama</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">No Telphon</th>
        <th scope="col">Dibuat</th>
    </tr>

      @php
          $no = 1;
      @endphp
      @foreach ($data as $row)
      <tr>
      <th scope="row">{{ $no++}}</th>
      <td>{{ $row->nama}}</td>
      <td>{{ $row->jenisKelamin}}</td>
      <td>0{{ $row->notelpon}}</td>
      <td>{{ $row->created_at->format('D M Y')}}</td>
    </tr>
      @endforeach

</table>

</body>
</html>


