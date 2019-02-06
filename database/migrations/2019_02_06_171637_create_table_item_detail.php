<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItemDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->string('item_detail_name', 255);
            $table->string('item_detail_image', 255);
            $table->text('item_detail_description');
            $table->string('item_detail_link', 255)->nullable();
            $table->string('item_detail_people', 255)->nullable();
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
        Schema::dropIfExists('item_detail');
    }
}
