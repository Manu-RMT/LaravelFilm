<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //temporaire car table pas encorecréer et peut provoquer une erreur
        Schema::disableForeignKeyConstraints();
        Schema::create('films', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->year('annee');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
