<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_blood_type')->unsigned();
            $table->bigInteger('id_appointment')->unsigned()->nullable();
            $table->bigInteger('id_blood_component')->unsigned();
            $table->integer('bb_tb');
            $table->integer('tekanan_sistol');
            $table->integer('tekanan_diastol');
            $table->integer('kadar_hb');
            $table->timestamps();

            $table->foreign('id_blood_type')->references('id')->on('blood_types')->onDelete('cascade');
            $table->foreign('id_blood_component')->references('id')->on('blood_components')->onDelete('cascade');
            // $table->foreign('id_appointment')->references('id')->on('appointments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_details');
    }
}
