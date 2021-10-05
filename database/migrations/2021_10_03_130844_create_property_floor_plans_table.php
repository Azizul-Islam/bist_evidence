<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyFloorPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_floor_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained();
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->string('size');
            $table->integer('room');
            $table->integer('bath');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('property_floor_plans');
    }
}
