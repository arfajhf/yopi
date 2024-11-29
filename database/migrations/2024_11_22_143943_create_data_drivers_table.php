<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_drivers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik')->unique();
            $table->string('foto');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('phone')->unique();

            // $table->bigInteger('id_pelanggan')->unsigned();
            // $table->foreign('id_pelanggan')->references('id')->on('data_pelanggans');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_drivers');
    }
};
