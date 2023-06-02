<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musiques', function (Blueprint $table) {
            $table->id();
            $table->string('titremus',100);
            $table->unsignedBigInteger('artiste_id');
            $table->timestamps();
            $table->foreign('artiste_id')
                ->references('id')
                ->on('musique_artiste')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musiques');
    }
}
