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
        Schema::create('automobiliais', function (Blueprint $table) {
            //$table->id();
            $table->integer('id');
            $table->increments('automobilio_id');
            $table->string('marke');
            $table->string('modelis');
            $table->string('numeris');


            $table->timestamps();
        });

    //    Schema::create('savininkais', function (Blueprint $table) {
    //        $table->increments('id');
    //        $table->string('vardas');
    //        $table->string('pavarde');
    //        $table->foreign('id')->references('id')->on('automobiliais')->onDelete('cascade');
//
    //    });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automobiliais');
    }
};
