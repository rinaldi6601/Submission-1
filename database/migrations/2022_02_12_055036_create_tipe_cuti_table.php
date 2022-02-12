<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId("karyawan_id")->constrained("karyawan")->onDelete("cascade")->onUpdate("cascade");
            $table->string('tgl_cuti');
            $table->string('lama_cuti');
            $table->string('keterangan');
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
        Schema::dropIfExists('tipe_cuti');
    }
};
