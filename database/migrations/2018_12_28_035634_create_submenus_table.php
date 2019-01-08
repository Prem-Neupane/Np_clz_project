<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            // $table->index('parent_id');
            // $table->foreign('parent_id')->references('id')->on('menus')->onDelete('cascade');        
            $table->string('title');
            $table->string('slug');
            $table->boolean('status');
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
        // $table->dropForeign('submenus_parent_id_foreign');
        // $table->dropIndex('submenus_parent_id_index');
        // $table->dropColumn('parent_id');
        Schema::dropIfExists('submenus');
        
    }
}
