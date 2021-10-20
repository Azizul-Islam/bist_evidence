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
            $table->mediumText('description')->nullable();
            $table->float('price',16);
            // $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->enum('purpose',['for sale','to rent']);
            $table->enum('completion_status',['ready','under constraction'])->default('ready');
            $table->string('address')->nullable();
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('sub_area_id')->nullable();
            $table->string('street')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('garage')->nullable();
            $table->string('size')->nullable();
            $table->date('year_built')->nullable();
            $table->string('video_link')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('is_featured')->nullable()->default(0);
            $table->enum('consumer',['owner','manager','guard','representative','admin'])->default('admin');
            $table->enum('status',['active','inactive'])->default('active');
            $table->enum('contract',['pending','hot offer','no fees','open house','sold'])->default('pending');
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
