<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('address');
            $table->float('price_start',16);
            $table->float('price_end',16)->nullalbe();
            $table->text('description')->nullable();
            $table->json('amenities')->nullable();
            $table->string('photo')->nullable();
            // $table->string('developer_name')->nullable();
            // $table->string('architect')->nullable();
            // $table->string('unit')->nullable();
            // $table->string('apartment_size')->nullable();
            // $table->date('handover_date')->nullable();
            // $table->string('land_size')->nullable();
            // $table->enum('construction',['ready','under construction'])->default('ready');
            $table->enum('project_status',['new','upcoming','ongoing'])->default('new');
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
        Schema::dropIfExists('projects');
    }
}
