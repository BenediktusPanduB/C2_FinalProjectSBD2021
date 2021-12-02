<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $fillable = ['Id_Petugas','Nama_Petugas','Pos_Petugas','Shift_Petugas'];
}
