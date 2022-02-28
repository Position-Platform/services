<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batiments', function (Blueprint $table) {
            $table->id();
            $table->string("nom")->nullable();
            $table->string("nombreNiveau");
            $table->string("codeBatiment");
            $table->string("longitude");
            $table->string("latitude");
            $table->string("image")->nullable();
            $table->string("indication")->nullable();
            $table->string("rue")->nullable();
            $table->string("ville");
            $table->string("commune");
            $table->string("quartier");
            $table->softDeletes();
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
        Schema::dropIfExists('batiments');
    }
};
