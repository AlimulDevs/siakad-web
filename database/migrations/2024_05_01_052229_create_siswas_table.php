<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("kelas_id");
            $table->unsignedBigInteger("jurusan_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign("kelas_id")->references("id")->on("kelas")->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign("jurusan_id")->references("id")->on("jurusans")->onDelete('cascade')
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
        Schema::dropIfExists('siswas');
    }
}