<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkirMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkir_masuk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('No_Karcis',12)->unique();
            $table->string('No_Kartu',16)->nullable();
            $table->string('Id_Petugas',12);
            $table->string('Lokasi_Masuk',11);
            $table->string('Nama_Petugas',30);
            $table->dateTime('Waktu_Masuk');
            $table->string('Jenis_Kendaraan',5);
            $table->string('No_Kendaraan',9);
            $table->string('Gambar_Masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parkir_masuk');
    }
}
