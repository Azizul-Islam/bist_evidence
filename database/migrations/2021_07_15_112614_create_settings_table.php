<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_website')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->mediumText('copyright')->nullable();
            $table->string('email');
            $table->string('email1')->nullable();
            $table->string('phone');
            $table->string('phone1')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('footer_description')->nullable();
            $table->string('on_off_time')->nullable();
            $table->string('get_in_touch_photo')->nullable();
            $table->string('get_in_touch_title')->nullable();
            $table->string('get_in_touch_description')->nullable();
            $table->string('facebook')->nullable();
            $table->string('gmail')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->json('others')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
