<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penjualan', function (Blueprint $table) {
            $table->increments('id_penjualan');
            $table->date('tgl_faktur');
            $table->string('no_faktur',10);
            $table->string('nama_konsumen',50);
            $table->integer('id_produk');
            $table->integer('jumlah');
            $table->bigInteger('total');
            $table->index('id_produk');
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
        Schema::dropIfExists('tb_penjualan');
    }
}
