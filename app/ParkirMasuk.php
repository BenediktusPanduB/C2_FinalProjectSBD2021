<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkirMasuk extends Model
{
    protected $table = 'parkir_masuk';
    protected $fillable = ['No_Karcis','No_Kartu','Id_Petugas','Lokasi_Masuk','Nama_Petugas','Waktu_Masuk','Jenis_Kendaraan','No_Kendaraan','Gambar_Masuk'];
}
