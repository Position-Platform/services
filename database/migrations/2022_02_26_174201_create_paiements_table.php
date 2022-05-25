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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->integer("idAbonnement");
            $table->integer("idManager");
            $table->integer("idCommercial");
            $table->date("datePaiement");
            $table->string("referenceId")->nullable();
            $table->string("referencePosition")->nullable();
            $table->string("typePaiement");
            $table->string("statut");
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
        Schema::dropIfExists('paiements');
    }
};
