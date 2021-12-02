@extends('main.navbar')

@section('container')
@if (session('sukses'))
<div class="alert alert-success" role="alert">
    {{ session('sukses') }}
</div>
@endif
<div class="row mb-5">
    <div class="col-12">
        <h1>Data Kartu</h1>
    </div>
</div>
<div class="row d-flex justify-content-end">
    <div class="col-6">

    </div>
    <div class="col-4">
        <form class="d-flex" method="GET" action="/kartu">
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
            <th width="10%">No_Kartu</th>
            <th width="15%">NIP_NRP</th>
            <th width="25%">Nama_Kartu</th>
            <th width="15%">Status</th>
            <th width="9%" colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_kartu as $kartu )
        <tr>
            <td>{{ $kartu -> No_Kartu }}</td>
            <td>{{ $kartu -> NIP_NRP }}</td>
            <td>{{ $kartu -> Nama_Kartu }}</td>
            <td>{{ $kartu -> Status }}</td>
            <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editData{{$kartu -> id }}">Edit</button>
            <a href="/kartu/{{ $kartu -> id }}/delete" class="btn btn-danger btn-md" onclick="return confirm('Yakin untuk menghapus?')">Delete</a></td>
            {{-- <a href="/kartu/{{ $kartu -> id }}/edit" class="btn btn-warning btn-md ">Edit</a>
            <a href="#" class="btn btn-danger btn-md">Delete</a> --}}
        </tr>
        <div class="modal fade" id="editData{{$kartu -> id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/kartu/update{{ $kartu -> id }}" method="POST">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="No_Kartu" class="form-label">No_Kartu</label>
                                <input type="number" name="No_Kartu" class="form-control" id="No_Kartu" placeholder="Masukan No Kartu" value="{{ $kartu -> No_Kartu }}">
                            </div>
                            <div class="mb-3">
                                <label for="NIP_NRP" class="form-label">NIP / NRP</label>
                                <input type="number" name="NIP_NRP" class="form-control" id="NIP_NRP" placeholder="Masukan NIP atau NRP" value="{{ $kartu -> NIP_NRP }}">
                            </div>
                            <div class="mb-3">
                                <label for="Nama_Kartu" class="form-label">Nama Kartu</label>
                                <input type="text" name="Nama_Kartu" class="form-control" id="Nama_Kartu" placeholder="Masukan Nama Kartu" value="{{ $kartu -> Nama_Kartu }}">
                            </div>
                            <div class="mb-3">
                                <label for="Status" class="form-label">Status</label>
                                <select type="text" name="Status" class="form-control" id="Status" placeholder="Masukan Status" value="{{ $kartu -> Status }}">
                                    <option value="Member">Member</option>
                                    <option value="Non-Member">Non-Member</option>
                                </select>
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
                <form action="/kartu/create" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="No_Kartu" class="form-label">No Kartu</label>
                        <input type="number" name="No_Kartu" class="form-control" id="No_Kartu" placeholder="Masukan No Kartu">
                    </div>
                    <div class="mb-3">
                        <label for="NIP_NRP" class="form-label">NIP / NRP</label>
                        <input type="number" name="NIP_NRP" class="form-control" id="NIP_NRP" placeholder="Masukan NIP_NRP">
                    </div>
                    <div class="mb-3">
                        <label for="Nama_Kartu" class="form-label">Nama Kartu</label>
                        <input type="text" name="Nama_Kartu" class="form-control" id="Nama_Kartu" placeholder="Masukan Nama Kartu">
                    </div>
                    <div class="mb-3">
                        <label for="Status" class="form-label">Status</label>
                        <select type="text" name="Status" class="form-control" id="Status" placeholder="Masukan Status">
                            <option value="" readonly="true" hidden="true">Please Choose</option>
                            <option value="Member">Member</option>
                            <option value="Non-Member">Non-Member</option>
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
