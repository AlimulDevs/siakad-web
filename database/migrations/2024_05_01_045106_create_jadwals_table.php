<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("guru_id");
            $table->unsignedBigInteger("kelas_id");
            $table->string("mata_pelajaran");
            $table->foreign("guru_id")->references("id")->on("gurus")->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign("kelas_id")->references("id")->on("kelas")->onDelete('cascade')
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
        Schema::dropIfExists('jadwals');
    }
}
