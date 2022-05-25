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
        Schema::create('commercials', function (Blueprint $table) {
            $table->id();
            $table->integer("idUser");
            $table->integer("numeroCni");
            $table->integer("numeroBadge");
            $table->string("ville");
            $table->string("quartier");
            $table->boolean("actif")->default(true);
            $table->enum("sexe", ["Masculin", "Feminin"]);
            $table->integer("whatsapp");
            $table->string("diplome");
            $table->string("tailleTshirt");
            $table->integer("age");
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
        Schema::dropIfExists('commercials');
    }
};
