<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Crypt;

class adminController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data_admin=\App\Admin::where('NIP','LIKE','%'.$request->search.'%')
            ->orWhere('Nama','LIKE','%'.$request->search.'%')
            ->orWhere('Username','LIKE','%'.$request->search.'%')
            ->orWhere('Password','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_admin=\App\Admin::All();
        }
        return view('dbAdmin.admin',[
            'data_admin'=> $data_admin,
            'title' => 'Admin'
        ]);
    }
    public function create(Request $request){
        $user = new \App\User;
        $user -> role = 'admin';
        $user -> name = $request->Nama;
        $user -> username = $request->Username;
        $user -> password = bcrypt($request-> Password);
        $user -> remember_token = Str::random(60);
        $user -> save();
        //insert table user
        $admin =  \App\Admin::create([
         'NIP' => $request->NIP,
         'Nama' => $request->Nama,
         'Username' => $request->Username,
         'Password' => bcrypt($request->Password)
        //insert table admin
       ]);
        return redirect('/admin')->with('sukses','Data berhasil ditambahkan');
    }
    public function update(Request $request,$id){
        $admin = \App\Admin::findOrFail($id);
        $admin->update([
            'NIP' => $request->NIP,
            'Nama' => $request->Nama,
            'Username' => $request->Username,
            'Password' => bcrypt($request->Password)
        ]);
        // $user = \App\User::where('id', $request -> user_id)->update();
        // $user -> name = $request->Nama;
        // $user -> username = $request->Username;
        // $user -> password = bcrypt($request-> Password);
        // $user -> save();
        return redirect('/admin')->with('sukses','Data berhasil diupdate');
    }


    public function delete($id){
        $admin = \App\Admin::find($id);
        $admin -> delete($admin);
        return redirect('/admin') ->with('sukses','Data berhasil dihapus');
    }
    // public function setPasswordCrypt($value){
    //     $this ->attributes['Password'] = Crypt::encryptString($value);
    // }
    // public function edit($id){
    //     $admin = \App\Admin::find($id);
    //     return view('dbAdmin.edit');
    // }
}
