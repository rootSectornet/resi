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
            $table->date('tanggal');
            $table->date('durasi');
            $table->string('lokasi_tujuan',150);
            $table->string('tujuan',250);
            $table->integer('status');
            $table->timestamps();
        });

        Schema::table('jadwals', function($table) {
            $table->foreignId('id_marketing')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_driver')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_kendaraan')->constrained('kendaraans')->onUpdate('cascade')->onDelete('cascade');
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
