<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addon', function (Blueprint $table) {
            // Addon
            $table->increments('id');
            $table->string('name', 32)->unique();
            $table->string('author', 20)->default('Unknown');
            $table->string('license', 50)->default('Unknown');
            $table->text('description');
            //$table->string('img_path', 100)->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('public')->unsigned()->default(0);
            $table->integer('downloads')->unsigned()->default(0);     
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addon');
    }
}
