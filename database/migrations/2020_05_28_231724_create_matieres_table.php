<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('programme_id');
            $table->unsignedBigInteger('coefficient_id');
            $table->unsignedBigInteger('professeur_id')->nullable();
            $table->foreign('professeur_id')
                ->references('id')
                ->on('professeurs');
            $table->foreign('programme_id')
                ->references('id')
                ->on('programmes');
            $table->foreign('coefficient_id')
                ->references('id')
                ->on('coefficients');
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
        Schema::dropIfExists('matieres');
    }
}
