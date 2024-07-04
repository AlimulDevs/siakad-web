<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa_absens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("siswa_id");
            $table->unsignedBigInteger("absen_id");
            $table->boolean("is_absen");
            $table->foreign("siswa_id")->references("id")->on("siswas")->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign("absen_id")->references("id")->on("absens")->onDelete('cascade')
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
        Schema::dropIfExists('siswa_absens');
    }
}
