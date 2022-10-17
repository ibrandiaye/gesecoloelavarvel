<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->double('note');
            $table->unsignedBigInteger('eleve_id');
            $table->unsignedBigInteger('evaluation_id');
            $table->foreign('eleve_id')
                ->references('id')
                ->on('eleves');
            $table->foreign('evaluation_id')
                ->references('id')
                ->on('evaluations');
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
        Schema::dropIfExists('notes');
    }
}
