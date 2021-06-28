<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyebabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyebabs', function (Blueprint $table) {
            $table->bigIncrements('kode_penyebab');
            $table->bigInteger('gejala')->unsigned();
            $table->string('penyebab', 50);
            // $table->bigInteger('penyebab')->unsigned();
            $table->double('cf');
            $table->timestamps();
        });

        Schema::table('penyebabs', function($table) {
            $table->foreign('gejala')->references('kode_gejala')->on('gejalas')->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyebabs');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
