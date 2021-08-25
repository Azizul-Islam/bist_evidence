<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable()->default('default_photo.png');
            $table->mediumText('description')->nullable();
            $table->string('address')->nullable();
            $table->string('size')->nullable();
            $table->float('price',16);
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('sub_area_id')->nullable();
            $table->enum('purpose',['sell','rent'])->default('sell');
            $table->enum('consumer',['owner','manager','guard','representative','admin'])->default('admin');
            $table->enum('status',['active','inactive'])->default('active');
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
        Schema::dropIfExists('properties');
    }
}
