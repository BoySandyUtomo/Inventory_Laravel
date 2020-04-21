<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id_bar', 255);
            $table->integer('id_ru')->unsigned();
            $table->string('nama_bar', 255);
            $table->integer('total_bar');
            $table->integer('rusak_bar');
            $table->string('image', 255);
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('id_ru')->references('id_ru')->on('ruangan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('created_by')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                    
            $table->foreign('updated_by')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
