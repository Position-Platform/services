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
            $table->integer("user_id")->nullable();
            $table->string("nom")->nullable();
            $table->string("nombre_niveau");
            $table->string("code");
            $table->string("longitude");
            $table->string("latitude");
            $table->text("image")->nullable();
            $table->text("indication")->nullable();
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
