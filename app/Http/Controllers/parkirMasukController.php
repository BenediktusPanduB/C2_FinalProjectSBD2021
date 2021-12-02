<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class parkirMasukController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data_parkirMasuk=\App\ParkirMasuk::where('No_Karcis','LIKE','%'.$request->search.'%')
            ->orWhere('No_Kartu','LIKE','%'.$request->search.'%')
            ->orWhere('Id_Petugas','LIKE','%'.$request->search.'%')
            ->orWhere('Lokasi_Masuk','LIKE','%'.$request->search.'%')
            ->orWhere('Nama_Petugas','LIKE','%'.$request->search.'%')
            ->orWhere('Waktu_Masuk','LIKE','%'.$request->search.'%')
            ->orWhere('Jenis_Kendaraan','LIKE','%'.$request->search.'%')
            ->orWhere('No_Kendaraan','LIKE','%'.$request->search.'%')
            ->orWhere('Gambar_Masuk','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_parkirMasuk=\App\ParkirMasuk::All();
        }
        return view('dbParkirMasuk.parkir',[
            'data_parkirMasuk' => $data_parkirMasuk,
            'title' => 'ParkirMasuk'
        ]);
    }
    public function create(Request $request){
        \App\ParkirMasuk::create($request -> all());
        return redirect('/parkir/masuk')->with('sukses','Data berhasil ditambahkan');
    }
    public function update(Request $request,$id){
        $parkirMasuk = \App\ParkirMasuk::findOrFail($id);
        $parkirMasuk->update($request -> all());
        return redirect('/parkir/masuk')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id){
        $parkirMasuk = \App\ParkirMasuk::find($id);
        $parkirMasuk -> delete($parkirMasuk);
        return redirect('/parkir/masuk') ->with('sukses','Data berhasil dihapus');
    }

    

}
