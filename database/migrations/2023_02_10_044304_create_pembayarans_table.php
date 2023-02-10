<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_bayar');
            $table->string('bulan_bayar', 8);
            $table->string('tahun_bayar', 4);
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('siswas_id')->constrained('siswas')->onDelete('cascade');
            $table->foreignId('spps_id')->constrained('spps')->onDelete('cascade');
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
        Schema::dropIfExists('pembayarans');
    }
}
