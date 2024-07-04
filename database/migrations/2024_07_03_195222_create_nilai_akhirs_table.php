<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiAkhirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_akhirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("siswa_id");
            $table->unsignedBigInteger("mata_pelajaran_id");
            $table->integer("nilai_tugas");
            $table->integer("nilai_uts");
            $table->integer("nilai_uas");
            $table->integer("nilai_akhir");
            $table->foreign("siswa_id")->references("id")->on("siswas")->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign("mata_pelajaran_id")->references("id")->on("mata_pelajarans")->onDelete('cascade')
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
        Schema::dropIfExists('nilai_akhirs');
    }
}
