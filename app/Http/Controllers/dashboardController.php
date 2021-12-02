<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index(){
        return view('Dashboard.index',[
            'title' => 'Dashboard'
        ]);
    }

    public function indexMember(Request $request){

        if($request->has('search')){
            $data_parkirMasuk=\App\ParkirMasuk::where('No_Kartu','LIKE','%'.$request->search.'%')->get();
            $data_parkirKeluar=\App\ParkirKeluar::where('No_Kartu','LIKE','%'.$request->search.'%')->get();
            $data_kartu=\App\Kartu::where('No_Kartu','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_parkirMasuk=\App\ParkirMasuk::All();
            $data_parkirKeluar=\App\ParkirKeluar::All();
        }

        return view('Dashboard.indexMember',[
            'data_parkirMasuk' => $data_parkirMasuk,
            'data_parkirKeluar' => $data_parkirKeluar,
            'data_kartu'=>$data_kartu,
            'title' => 'Data Parkir'
        ]);
    }
}
