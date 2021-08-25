<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('sub_area_id')->nullable();
            $table->enum('purpose',['sell','rent'])->default('sell');
            $table->enum('consumer',['owner','manager','guard','representative'])->default('owner');
            $table->enum('status',['pending','approve','cancel'])->default('pending');
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
        Schema::dropIfExists('frontend_properties');
    }
}
