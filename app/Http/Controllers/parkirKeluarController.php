<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class parkirKeluarController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data_parkirKeluar=\App\ParkirKeluar::where('No_Karcis','LIKE','%'.$request->search.'%')
            ->orWhere('No_Kartu','LIKE','%'.$request->search.'%')
            ->orWhere('Id_Petugas','LIKE','%'.$request->search.'%')
            ->orWhere('Lokasi_Keluar','LIKE','%'.$request->search.'%')
            ->orWhere('Nama_Petugas','LIKE','%'.$request->search.'%')
            ->orWhere('Waktu_Keluar','LIKE','%'.$request->search.'%')
            ->orWhere('Jenis_Kendaraan','LIKE','%'.$request->search.'%')
            ->orWhere('No_Kendaraan','LIKE','%'.$request->search.'%')
            ->orWhere('Gambar_Keluar','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_parkirKeluar=\App\ParkirKeluar::All();
        }
        return view('dbParkirKeluar.parkir',[
            'data_parkirKeluar' => $data_parkirKeluar,
            'title' => 'ParkirKeluar'
        ]);
    }
    public function create(Request $request){
        \App\ParkirKeluar::create($request -> all());
        return redirect('/parkir/keluar')->with('sukses','Data berhasil ditambahkan');
    }
    public function update(Request $request,$id){
        $parkirKeluar = \App\ParkirKeluar::findOrFail($id);
        $parkirKeluar->update($request -> all());
        return redirect('/parkir/keluar')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id){
        $parkirKeluar = \App\ParkirKeluar::find($id);
        $parkirKeluar -> delete($parkirKeluar);
        return redirect('/parkir/keluar') ->with('sukses','Data berhasil dihapus');
    }

    public function member(Request $request){
        if($request->has('search')){
            $data_parkirKeluar=\App\ParkirKeluar::where('No_Kartu','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_parkirKeluar=\App\ParkirKeluar::All();
        }
        return view('dbParkirKeluar.parkirMember',[
            'data_parkirKeluar' => $data_parkirKeluar,
            'title' => 'ParkirKeluar'
        ]);
    }
}
