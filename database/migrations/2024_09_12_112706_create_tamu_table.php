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
    Schema::create('keperluan_kunjungan', function (Blueprint $table) {
        $table->string('id')->primary();
        $table->string('nama');
        $table->char('notelpon', 13);
        $table->string('alamat')->nullable();
        $table->string('email')->aftaer; //cuma 
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tamu');
    }
};
