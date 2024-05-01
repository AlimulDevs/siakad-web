<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaktuJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waktu_jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("jadwal_id");
            $table->string("hari");
            $table->string("jam_awal");
            $table->string("jam_akhir");
            $table->foreign("jadwal_id")->references("id")->on("jadwals")->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('waktu_jadwals');
    }
}
