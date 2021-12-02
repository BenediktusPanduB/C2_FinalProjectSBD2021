@extends('main.navbar')

@section('container')
@if (session('sukses'))
<div class="alert alert-success" role="alert">
    {{ session('sukses') }}
</div>
@endif
<div class="row mb-5">
    <div class="col-12">
        <h1>Data Petugas</h1>
    </div>
</div>
<div class="row d-flex justify-content-end">
    <div class="col-6">

    </div>
    <div class="col-4">
        <form class="d-flex" method="GET" action="/petugas">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
    </div>
    <div class="col-2" style="width:145px">
        <button type="button" class="btn btn-primary btn-md mb-3" data-bs-toggle="modal" data-bs-target="#createData">
            Tambah Data
        </button>
    </div>
</div>

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th width="15%">Id Petugas</th>
            <th width="25%">Nama</th>
            <th width="10%">Pos</th>
            <th width="10%">Shift</th>
            <th width="9%" colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_petugas as $petugas )
        <tr>
            <td>{{ $petugas -> Id_Petugas }}</td>
            <td>{{ $petugas -> Nama_Petugas }}</td>
            <td>{{ $petugas -> Pos_Petugas }}</td>
            <td>{{ $petugas -> Shift_Petugas }}</td>
            <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editData{{$petugas -> id }}">Edit</button>
            <a href="/petugas/{{ $petugas -> id }}/delete" class="btn btn-danger btn-md" onclick="return confirm('Yakin untuk menghapus?')">Delete</a></td>
            {{-- <a href="/petugas/{{ $petugas -> id }}/edit" class="btn btn-warning btn-md ">Edit</a>
            <a href="#" class="btn btn-danger btn-md">Delete</a> --}}
        </tr>
        <div class="modal fade" id="editData{{$petugas -> id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/petugas/update{{ $petugas -> id }}" method="POST">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="Id_Petugas" class="form-label">Id_Petugas</label>
                                <input type="number" name="Id_Petugas" class="form-control" id="Id" placeholder="Masukan Id Petugas" value="{{ $petugas -> Id_Petugas }}">
                            </div>
                            <div class="mb-3">
                                <label for="Nama_Petugas" class="form-label">Nama_Petugas</label>
                                <input type="text" name="Nama_Petugas" class="form-control" id="nama" placeholder="Masukan Nama Petugas" value="{{ $petugas -> Nama_Petugas }}">
                            </div>
                            <div class="mb-3">
                                <label for="Pos_Petugas" class="form-label">Pos_Petugas</label>
                                <select type="number" name="Pos_Petugas" class="form-control" id="Pos_Petugas" placeholder="Masukan Pos Petugas" value="{{ $petugas -> Pos_Petugas }}">
                                    <option value="OUT_MTR1_L1">OUT_MTR1_L1</option>
                                    <option value="OUT_MTR1_L2">OUT_MTR1_L2</option>
                                    <option value="OUT_MBL1_L1">OUT_MBL1_L1</option>
                                    <option value="OUT_MBL1_L2">OUT_MBL1_L2</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Shift_Petugas" class="form-label">Shift_Petugas</label>
                                <select type="number" name="Shift_Petugas" class="form-control" id="Shift_Petugas" placeholder="Masukan Shift Petugas" value="{{ $petugas -> Shift_Petugas }}">
                                    <option value="Pagi">Pagi</option>
                                    <option value="Siang">Siang</option>
                                    <option value="Malam">Malam</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Apply</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div
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
                <form action="/petugas/create" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="Id_Petugas" class="form-label">Id_Petugas</label>
                        <input type="number" name="Id_Petugas" class="form-control" id="Id_Petugas" placeholder="Masukan Id Petugas">
                    </div>
                    <div class="mb-3">
                        <label for="Nama_Petugas" class="form-label">Nama_Petugas</label>
                        <input type="text" name="Nama_Petugas" class="form-control" id="Nama_Petugas" placeholder="Masukan Nama Petugas">
                    </div>
                    <div class="mb-3">
                        <label for="Pos_Petugas" class="form-label">Pos_Petugas</label>
                        <select type="number" name="Pos_Petugas" class="form-control" id="Pos_Petugas" placeholder="Masukan Pos Petugas">
                        <option value="" readonly="true" hidden="true">Please Choose</option>
                        <option value="OUT_MTR1_L1">OUT_MTR1_L1</option>
                        <option value="OUT_MTR1_L2">OUT_MTR1_L2</option>
                        <option value="OUT_MBL1_L1">OUT_MBL1_L1</option>
                        <option value="OUT_MBL1_L2">OUT_MBL1_L2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Shift_Petugas" class="form-label">Shift_Petugas</label>
                        <select type="number" name="Shift_Petugas" class="form-control" id="Shift_Petugas" placeholder="Masukan Shift Petugas">
                            <option value="" readonly="true" hidden="true">Please Choose</option>
                            <option value="Pagi">Pagi</option>
                            <option value="Siang">Siang</option>
                            <option value="Malam">Malam</option>
                        </select>
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
