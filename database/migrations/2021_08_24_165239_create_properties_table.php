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
            $table->text('description')->nullable();
            $table->float('price',16);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->enum('purpose',['for sale','to rent','buy']);
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
            $table->string('featured_image');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('is_featured')->nullable()->default(0);
            $table->enum('consumer',['owner','manager','guard','representative','admin','agent'])->default('admin');
            $table->enum('status',['active','inactive'])->default('active');
            $table->enum('contract',['hot offer','no fees','open house','sold']);
            $table->enum('property_status',['pending','approve','rejected'])->default('pending');
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
