<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kartuController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data_kartu=\App\Kartu::where('No_Kartu','LIKE','%'.$request->search.'%')
            ->orWhere('NIP_NRP','LIKE','%'.$request->search.'%')
            ->orWhere('Nama_Kartu','LIKE','%'.$request->search.'%')
            ->orWhere('Status','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_kartu=\App\Kartu::All();
        }
        return view('dbKartu.kartu',[
            'data_kartu' => $data_kartu,
            'title' => 'Kartu'
        ]);
    }
    public function create(Request $request){
        \App\Kartu::create($request -> all());
        return redirect('/kartu')->with('sukses','Data berhasil ditambahkan');
    }
    public function update(Request $request,$id){
        $kartu = \App\Kartu::findOrFail($id);
        $kartu->update($request -> all());
        return redirect('/kartu')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id){
        $kartu = \App\Kartu::find($id);
        $kartu -> delete($kartu);
        return redirect('/kartu') ->with('sukses','Data berhasil dihapus');
    }
}
