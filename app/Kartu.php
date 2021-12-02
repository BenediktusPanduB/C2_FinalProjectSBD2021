<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kartu extends Model
{
    protected $table = 'kartu';
    protected $fillable = ['No_Kartu','NIP_NRP','Nama_Kartu','Status'];
}
