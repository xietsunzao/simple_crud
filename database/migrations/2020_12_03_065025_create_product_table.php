<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->string('kode_produk', 5);
            $table->string('nama_produk', 50);
            $table->tinyInteger(('id_kategori'));
            $table->bigInteger('harga_jual');
            $table->bigInteger('harga_beli');
            $table->tinyInteger('id_unit');
            $table->index(['id_kategori', 'id_unit']);
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
        Schema::dropIfExists('tb_produk');
    }
}
