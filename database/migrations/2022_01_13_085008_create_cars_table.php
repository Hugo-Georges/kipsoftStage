<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('modele');
            $table->string('description');
            $table->integer('prix');
            $table->integer('annee');
            $table->integer('km');
            $table->unsignedBigInteger('motor_id');
            $table->foreign('motor_id')
                ->references('id')
                ->on('mtorisations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('cars');
    }
}
