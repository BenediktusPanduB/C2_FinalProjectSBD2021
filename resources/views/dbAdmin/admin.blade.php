@extends('main.navbar')

@section('container')
@if (session('sukses'))
<div class="alert alert-success" role="alert">
    {{ session('sukses') }}
</div>
@endif
<div class="row mb-5">
    <div class="col-12">
        <h1>Data Admin</h1>
    </div>
</div>
<div class="row d-flex justify-content-end">
    <div class="col-6">

    </div>
    <div class="col-4">
        <form class="d-flex" method="GET" action="/admin">
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
            <th width="5%">NIP</th>
            <th width="15%">Nama</th>
            <th width="10%">Username</th>
            <th width="15%">Password</th>
            <th width="10%" colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_admin as $admin )
        <tr>
            <td>{{ $admin -> NIP }}</td>
            <td>{{ $admin -> Nama }}</td>
            <td>{{ $admin -> Username }}</td>
            <td>{{ $admin -> Password }}</td>
            <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editData{{$admin -> id }}">Edit</button>
            <a href="/admin/{{ $admin -> id }}/delete" class="btn btn-danger btn-md" onclick="return confirm('Yakin untuk menghapus?')">Delete</a></td>
            {{-- <a href="/admin/{{ $admin -> id }}/edit" class="btn btn-warning btn-md ">Edit</a>
            <a href="#" class="btn btn-danger btn-md">Delete</a> --}}
        </tr>
        <div class="modal fade" id="editData{{$admin -> id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/update{{ $admin -> id }}" method="POST">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="number" name="NIP" class="form-control" id="nip" value="{{ $admin -> NIP }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="Nama" class="form-control" id="nama" value="{{ $admin -> Nama }}" >
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="Username" class="form-control" id="username" value="{{ $admin -> Username }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="Password" class="form-control" id="password" value="{{ $admin -> Password }}">
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
                <form action="/admin/create" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="number" name="NIP" class="form-control" id="nip" placeholder="Masukan NIP">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="Nama" class="form-control" id="nama" placeholder="Masukan Nama">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="Username" class="form-control" id="username" placeholder="Masukan Username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="Password" class="form-control" id="password" placeholder="Masukan Password">
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
