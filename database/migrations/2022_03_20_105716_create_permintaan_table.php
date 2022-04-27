<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_darah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_darah');
            $table->timestamps();
        });
        
        Schema::create('permintaan', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('bulan');
            $table->unsignedBigInteger('jenis_darah'); 
            $table->integer('permintaan');
            $table->timestamps();
            $table->foreign('jenis_darah')->references('id')->on('jenis_darah')->onUpdate('cascade')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_darah');
        Schema::dropIfExists('permintaan');
    }
}
