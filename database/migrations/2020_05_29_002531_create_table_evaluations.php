<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEvaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->unsignedBigInteger('semestre_id');
            $table->unsignedBigInteger('type_evaluation_id');
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('matiere_id');
            $table->foreign('semestre_id')
                ->references('id')
                ->on('semestres');
            $table->foreign('type_evaluation_id')
                ->references('id')
                ->on('type_evaluations');
            $table->foreign('classe_id')
                ->references('id')
                ->on('classes');
            $table->foreign('matiere_id')
                ->references('id')
                ->on('matieres');
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
        Schema::dropIfExists('evaluations');
    }
}
