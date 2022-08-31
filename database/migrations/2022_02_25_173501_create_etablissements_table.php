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
            $table->integer("batiment_id");
            $table->text("indication_adresse")->nullable();
            $table->string("code_postal")->nullable();
            $table->string("site_internet")->nullable();
            $table->string("nom_manager")->nullable();
            $table->string("contact_manager")->nullable();
            $table->integer("user_id")->nullable();
            $table->integer("etage");
            $table->text("cover")->nullable();
            $table->string("phone");
            $table->string("whatsapp1");
            $table->string("whatsapp2")->nullable();
            $table->text("description")->nullable();
            $table->integer("osm_id")->unique()->nullable();
            $table->text("services");
            $table->text("ameliorations")->nullable();
            $table->integer("vues")->default(0);
            $table->text("logo")->nullable();
            $table->text("logo_map")->nullable();
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
