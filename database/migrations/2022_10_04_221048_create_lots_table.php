<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->integer('uid');
            $table->string('Seller')->nullable();
            $table->string('Plant')->nullable();
            $table->string('materialLocation')->nullable();
            $table->string('Category')->nullable();
            $table->string('Quantity')->nullable();
            $table->string('StartDate');
            $table->string('EndDate');
            $table->string('Price')->nullable();
            // $table->string('Material')->nullable();
            $table->string('Auction')->nullable();
            $table->boolean('status')->default(false);
            $table->string('customFields')->default('');
            $table->timestamps();
        });
    }

    /**Location
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lots');
    }
}
