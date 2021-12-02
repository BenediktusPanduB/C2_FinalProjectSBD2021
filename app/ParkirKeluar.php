<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkirKeluar extends Model
{
    protected $table = 'parkir_keluar';
    protected $fillable = ['No_Karcis','No_Kartu','Id_Petugas','Lokasi_Keluar','Nama_Petugas','Waktu_Keluar','Jenis_Kendaraan','No_Kendaraan','Gambar_Keluar'];

}
