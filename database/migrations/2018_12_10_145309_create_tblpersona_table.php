<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblpersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_persona', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_persona');
            $table->date('fec_nacimiento');
            $table->float('sueldo');
            $table->string('estado');
            $table->integer('sector_id')->unsigned();
            $table->integer('zona_id')->unsigned();

            $table->foreign('sector_id')->references('id')->on('tbl_sector')
            ->onDelete('cascade')->nullable();

            $table->foreign('zona_id')->references('id')->on('tbl_zona')
            ->onDelete('cascade')->nullable();


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
        Schema::dropIfExists('tbl_persona');
    }
}
