<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('tempat_ibadahs')) {
            Schema::create('tempat_ibadahs', function (Blueprint $table) {
                $table->id();
                $table->string('nama_tempat');
                $table->string('alamat');
                $table->string('jenis_ibadah');
                $table->decimal('latitude', 10, 8);
                $table->decimal('longitude', 11, 8);
                $table->string('gambar')->nullable();
                $table->timestamps();
            });
        }
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tempat_ibadahs');
    }
};
