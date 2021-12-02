<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Admin extends Model
{
    protected $table = 'admin';
    protected $fillable = ['NIP','Nama','Username','Password'];


}
