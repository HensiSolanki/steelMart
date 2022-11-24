<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('categoryId')->nullable();
            $table->integer('uid');
            $table->float('thick');
            $table->float('height');
            $table->float('width');
            $table->float('weight');
            $table->bigInteger('price');
            $table->string('coilLength')->nullable();
            $table->string('JSWgrade')->nullable();
            $table->string('grade')->nullable();
            $table->string('qty')->nullable();
            $table->string('majorDefect')->nullable();
            $table->string('coating')->nullable();
            $table->string('testedCoating')->nullable();
            $table->string('tinTemper')->nullable();
            $table->string('eqSpeci')->nullable();
            $table->string('heatNo')->nullable();
            $table->string('passivation')->nullable();
            $table->string('coldTreatment')->nullable();
            $table->string('plantNo')->nullable();
            $table->string('qualityRemark')->nullable();
            $table->string('storageLocation')->nullable();
            $table->string('edgeCondition')->nullable();
            $table->string('plantLotNo')->nullable();
            $table->float('inStock')->nullable();
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
        Schema::dropIfExists('materials');
    }
}
