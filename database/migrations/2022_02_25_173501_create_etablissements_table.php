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
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("idBatiment");
            $table->string("indicationAdresse")->nullable();
            $table->string("codePostal")->nullable();
            $table->string("siteInternet")->nullable();
            $table->string("idCommercial")->nullable();
            $table->string("idManager")->nullable();
            $table->string("idUser")->nullable();
            $table->string("etage");
            $table->string("cover");
            $table->string("vues")->default(0);
            $table->string("phone");
            $table->string("whatsapp1");
            $table->string("whatsapp2")->nullable();
            $table->string("description")->nullable();
            $table->string("osmId")->nullable();
            $table->boolean("updated")->default(false);
            $table->string("revoir")->default(false);
            $table->string("valide")->default(false);
            $table->string("services");
            $table->string("ameliorations")->nullable();
            $table->integer("avis")->default(0);
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
        Schema::dropIfExists('etablissements');
    }
};
