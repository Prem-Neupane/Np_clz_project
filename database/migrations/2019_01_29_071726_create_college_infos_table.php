<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('college_name');
            $table->string('logo');
            $table->string('email');
            $table->integer('contact_no');
            $table->string('address');
            $table->boolean('status');
            $table->string('facebook_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('college_infos');
    }
}
