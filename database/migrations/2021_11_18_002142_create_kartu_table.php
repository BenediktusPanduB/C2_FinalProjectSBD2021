<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKartuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('No_Kartu',16)->unique();
            $table->string('NIP_NRP',20);
            $table->string('Nama_Kartu',30);
            $table->string('Status',10);
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
        Schema::dropIfExists('kartu');
    }
}
