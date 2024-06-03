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
        Schema::create('osm_data', function (Blueprint $table) {
            $table->id();
            $table->string("sous_categorie_id");
            $table->string("osm_id");
            $table->string("name");
            $table->string("lon");
            $table->string("lat");
            $table->string("opening_hours")->nullable();
            $table->string("phone")->nullable();
            $table->string("website")->nullable();
            $table->string("code_postal")->nullable();
            $table->string("city")->nullable();
            $table->string("quartier")->nullable();
            $table->string("rue")->nullable();
            $table->string("image")->nullable();
            $table->string("description")->nullable();
            $table->string("services")->nullable();
            $table->string("commodites")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('osm_data');
    }
};
