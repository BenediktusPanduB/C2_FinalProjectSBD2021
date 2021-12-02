<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class petugasController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data_petugas=\App\Petugas::where('Id_Petugas','LIKE','%'.$request->search.'%')
            ->orWhere('Nama_Petugas','LIKE','%'.$request->search.'%')
            ->orWhere('Pos_Petugas','LIKE','%'.$request->search.'%')
            ->orWhere('Shift_Petugas','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_petugas=\App\Petugas::All();
        }
        return view('dbPetugas.petugas',[
            'data_petugas' => $data_petugas,
            'title' => 'Petugas'
        ]);
    }
    public function create(Request $request){
        $user = new \App\User;
        $user -> role = 'petugas';
        $user -> name = $request->Nama_Petugas;
        $user -> username = $request->Id_Petugas;
        $user -> password =bcrypt('petugas') ;
        $user -> remember_token = Str::random(60);
        $user -> save();
        $petugas = \App\Petugas::create($request -> all());
        return redirect('/petugas')->with('sukses','Data berhasil ditambahkan');
    }
    public function update(Request $request,$id){
        $petugas = \App\Petugas::findOrFail($id);
        $petugas->update($request -> all());
        return redirect('/petugas')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id){
        $petugas = \App\Petugas::find($id);
        $petugas -> delete($petugas);
        return redirect('/petugas') ->with('sukses','Data berhasil dihapus');
    }
}
