@extends('main.navbar')

@section('container')
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
<div class="row d-flex justify-content-end">
    <div class="col-6">

    </div>
    <div class="col-4">
        <form class="d-flex" method="GET" action="/parkir/masuk">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
    </div>
    <div class="col-2"  style="width:145px">
        <button type="button" class="btn btn-primary btn-md mb-3" data-bs-toggle="modal" data-bs-target="#createData">
            Tambah Data
        </button>
    </div>
</div>

<table class="table table-hover table-bordered">
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
            <th width="10%" colspan="2">Action</th>
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
            <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editData{{$parkirMasuk -> id }}">Edit</button>
            <a href="/parkir/masuk/{{ $parkirMasuk -> id }}/delete" class="btn btn-danger btn-md" onclick="return confirm('Yakin untuk menghapus?')">Delete</a></td>
            {{-- <a href="/parkirMasuk/{{ $parkirMasuk -> id }}/edit" class="btn btn-warning btn-md ">Edit</a>
            <a href="#" class="btn btn-danger btn-md">Delete</a> --}}
        </tr>
        <div class="modal fade" id="editData{{$parkirMasuk -> id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/parkir/masuk/update{{ $parkirMasuk -> id }}" method="POST">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="No_Karcis" class="form-label">No_Karcis</label>
                                <input type="number" name="No_Karcis" class="form-control" id="No_Karcis" placeholder="Masukan No Kartu" value="{{ $parkirMasuk -> No_Karcis }}">
                            </div>
                            <div class="mb-3">
                                <label for="No_Kartu" class="form-label">No_Kartu</label>
                                <input type="number" name="No_Kartu" class="form-control" id="No_Kartu" placeholder="Masukan No Kartu" value="{{ $parkirMasuk -> No_Kartu }}">
                            </div>
                            <div class="mb-3">
                                <label for="Id_Petugas" class="form-label">Id Petugas</label>
                                <input type="number" name="Id_Petugas" class="form-control" id="Id_Petugas" placeholder="Masukan Id Petugas" value="{{ $parkirMasuk -> Id_Petugas }}">
                            </div>
                            <div class="mb-3">
                                <label for="Lokasi_Masuk" class="form-label">Lokasi Masuk</label>
                                <select type="text" name="Lokasi_Masuk" class="form-control" id="Lokasi_Masuk" placeholder="Masukan Lokasi Masuk" value="{{ $parkirMasuk -> Lokasi_Masuk }}">
                                    <option value="IN_MTR1_L1">IN_MTR1_L1</option>
                                    <option value="IN_MTR1_L2">IN_MTR1_L2</option>
                                    <option value="IN_MBL1_L1">IN_MBL1_L1</option>
                                    <option value="IN_MBL1_L2">IN_MBL1_L2</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Nama_Petugas" class="form-label">Nama Petugas</label>
                                <input type="text" name="Nama_Petugas" class="form-control" id="Nama_Petugas" placeholder="Masukan Nama Petugas" value="{{ $parkirMasuk -> Nama_Petugas }}">
                            </div>
                            <div class="mb-3">
                                <label for="Waktu_Masuk" class="form-label">Waktu Masuk</label>
                                <input type="datetime-local" name="Waktu_Masuk" class="form-control" id="Waktu_Masuk" placeholder="Masukan Waktu Masuk" disabled value="{{ $parkirMasuk -> Waktu_Masuk }}">
                            </div>
                            <div class="mb-3">
                                <label for="Jenis_Kendaraan" class="form-label">Jenis Kendaraan</label>
                                <select class="form-control" name="Jenis_Kendaraan" id="Jenis_Kendaraan" value="{{ $parkirMasuk -> Jenis_Kendaraan }}">
                                    <option value="Mobil">Mobil</option>
                                    <option value="Motor">Motor</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="No_Kendaraan" class="form-label">Nomor Kendaraan</label>
                                <input type="text" name="No_Kendaraan" class="form-control" id="No_Kendaraan" placeholder="Masukan Nomor Kendaraan" value="{{ $parkirMasuk -> No_Kendaraan }}">
                            </div>
                            <div class="mb-3">
                                <label for="Gambar_Masuk" class="form-label">Gambar Masuk</label>
                                <input type="text" name="Gambar_Masuk" class="form-control" id="Gambar_Masuk" placeholder="Masukan Gambar Kendaraan" value="{{ $parkirMasuk -> Gambar_Masuk }}">
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Apply</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>



<div class="modal fade" id="createData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/parkir/masuk/create" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="No_Karcis" class="form-label">No_Karcis</label>
                        <input type="number" name="No_Karcis" class="form-control" id="No_Karcis" placeholder="Masukan No Kartu">
                    </div>
                    <div class="mb-3">
                        <label for="No_Kartu" class="form-label">No_Kartu</label>
                        <input type="number" name="No_Kartu" class="form-control" id="No_Kartu" placeholder="Masukan No Kartu">
                    </div>
                    <div class="mb-3">
                        <label for="Id_Petugas" class="form-label">Id Petugas</label>
                        <input type="number" name="Id_Petugas" class="form-control" id="Id_Petugas" placeholder="Masukan Id Petugas">
                    </div>
                    <div class="mb-3">
                        <label for="Lokasi_Masuk" class="form-label">Lokasi Masuk</label>
                        <select type="text" name="Lokasi_Masuk" class="form-control" id="Lokasi_Masuk" placeholder="Masukan Lokasi Masuk">
                        <option value="" readonly="true" hidden="true">Please Choose</option>
                            <option value="IN_MTR1_L1">IN_MTR1_L1</option>
                            <option value="IN_MTR1_L2">IN_MTR1_L2</option>
                            <option value="IN_MBL1_L1">IN_MBL1_L1</option>
                            <option value="IN_MBL1_L2">IN_MBL1_L2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Nama_Petugas" class="form-label">Nama Petugas</label>
                        <input type="text" name="Nama_Petugas" class="form-control" id="Nama_Petugas" placeholder="Masukan Nama Petugas">
                    </div>
                    <div class="mb-3">
                        <label for="Waktu_Masuk" class="form-label">Waktu Masuk</label>
                        <input type="datetime-local" name="Waktu_Masuk" class="form-control" id="Waktu_Masuk" placeholder="Masukan Waktu Masuk">
                    </div>
                    <div class="mb-3">
                        <label for="Jenis_Kendaraan" class="form-label">Jenis Kendaraan</label><br>
                        <select class="form-control" name="Jenis_Kendaraan" id="Jenis_Kendaraan">
                            <option value="" readonly="true" hidden="true">Please Choose</option>
                            <option value="Mobil">Mobil</option>
                            <option value="Motor">Motor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="No_Kendaraan" class="form-label">Nomor Kendaraan</label>
                        <input type="text" name="No_Kendaraan" class="form-control" id="No_Kendaraan" placeholder="Masukan Nomor Kendaraan">
                    </div>
                    <div class="mb-3">
                        <label for="Gambar_Masuk" class="form-label">Gambar Masuk</label>
                        <input type="text" name="Gambar_Masuk" class="form-control" id="Gambar_Masuk" placeholder="Masukan Gambar Kendaraan" >
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
