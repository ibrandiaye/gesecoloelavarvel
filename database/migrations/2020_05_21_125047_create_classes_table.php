<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('niveau_id');
            $table->unsignedBigInteger('annee_scolaire_id');
            $table->unsignedBigInteger('serie_id')->nullable();
            $table->unsignedBigInteger('tarif_id')->nullable();
            $table->foreign('niveau_id')
                ->references('id')
                ->on('niveaux');
            $table->foreign('annee_scolaire_id')
                ->references('id')
                ->on('annee_scolaires');
            $table->foreign('serie_id')
                ->references('id')
                ->on('series');
            $table->foreign('tarif_id')
                ->references('id')
                ->on('tarifs');
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
        Schema::dropIfExists('classes');
    }
}
