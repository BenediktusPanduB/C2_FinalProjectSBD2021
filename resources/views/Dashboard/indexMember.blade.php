@extends('main.navbar2')

@section('container')

<div class="bg-light p-5 rounded-lg m-3">
  {{-- <h1 class="display-4">Hello,{{  $_GET['search'] }}  </h1> --}}
@foreach ($data_kartu as $dk)
@if ($dk -> No_Kartu===$_GET['search']  )@endif
<h1 class="display-4">Hello,   {{ $dk -> Nama_Kartu }}   </h1>
@endforeach


  <h2 class="display-6 mb-5">as Member</h2>

@if (session('sukses'))
<div class="alert alert-success" role="alert">
    {{ session('sukses') }}
</div>
@endif
<div class="row mb-5">
    <div class="col-12">
        <h1>Data Parkir Masuk</h1>
    </div>
</div>
<div class="row d-flex justify-content-end ">
    <div class="col-6">

    </div>
    <div class="col-4">

    </div>
    <div class="col-2"  style="width:145px">

    </div>
</div>

<table class="table table-hover table-bordered mb-5">
    <thead>
        <tr>
            <th width="1%">No Karcis</th>
            <th width="1%">No Kartu</th>
            <th width="1%">Id Petugas</th>
            <th width="1%">Lokasi Masuk</th>
            <th width="2%">Nama Petugas</th>
            <th width="9%">Waktu Masuk</th>
            <th width="1%">Jenis Kendaraan</th>
            <th width="1%">Nomor Kendaraan</th>
            <th width="5%">Gambar Masuk</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_parkirMasuk as $parkirMasuk)
        <tr>
            <td>{{ $parkirMasuk -> No_Karcis }}</td>
            <td>{{ $parkirMasuk -> No_Kartu }}</td>
            <td>{{ $parkirMasuk -> Id_Petugas }}</td>
            <td>{{ $parkirMasuk -> Lokasi_Masuk }}</td>
            <td>{{ $parkirMasuk -> Nama_Petugas }}</td>
            <td>{{ $parkirMasuk -> Waktu_Masuk }}</td>
            <td>{{ $parkirMasuk -> Jenis_Kendaraan }}</td>
            <td>{{ $parkirMasuk -> No_Kendaraan }}</td>
            <td>{{ $parkirMasuk -> Gambar_Masuk }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="row mb-5">
    <div class="col-12">
        <h1>Data Parkir Keluar</h1>
    </div>
</div>

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th width="1%">No Karcis</th>
            <th width="1%">No Kartu</th>
            <th width="1%">Id Petugas</th>
            <th width="1%">Lokasi Keluar</th>
            <th width="2%">Nama Petugas</th>
            <th width="9%">Waktu Keluar</th>
            <th width="1%">Jenis Kendaraan</th>
            <th width="1%">Nomor Kendaraan</th>
            <th width="5%">Gambar Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_parkirKeluar as $parkirKeluar)
        <tr>
            <td>{{ $parkirKeluar -> No_Karcis }}</td>
            <td>{{ $parkirKeluar -> No_Kartu }}</td>
            <td>{{ $parkirKeluar -> Id_Petugas }}</td>
            <td>{{ $parkirKeluar -> Lokasi_Keluar }}</td>
            <td>{{ $parkirKeluar -> Nama_Petugas }}</td>
            <td>{{ $parkirKeluar -> Waktu_Keluar }}</td>
            <td>{{ $parkirKeluar -> Jenis_Kendaraan }}</td>
            <td>{{ $parkirKeluar -> No_Kendaraan }}</td>
            <td>{{ $parkirKeluar -> Gambar_Keluar }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
