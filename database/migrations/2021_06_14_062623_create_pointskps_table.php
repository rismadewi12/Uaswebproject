<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointskpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointskps', function (Blueprint $table) {
            $table->id();
            $table->string('nim',12);
            $table->string('tahun_akademik',6);
            $table->string('dosen_Pa');
            $table->string('nama_kegiatan');
            $table->string('rincian');
            $table->string('ketegori');
            $table->string('point',25);
            $table->string('file');

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
        Schema::dropIfExists('pointskps');
    }
}
