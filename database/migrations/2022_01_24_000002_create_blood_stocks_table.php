<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_blood_type')->unsigned();
            $table->bigInteger('id_blood_component')->unsigned();
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_blood_type')->references('id')->on('blood_types')->onDelete('cascade');
            $table->foreign('id_blood_component')->references('id')->on('blood_components')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_stocks');
    }
}
