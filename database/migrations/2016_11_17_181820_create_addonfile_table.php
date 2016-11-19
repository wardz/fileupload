<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddonfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addonfile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40)->index();
            $table->string('path', 100)->unique();
            $table->integer('size')->unsigned();
            $table->integer('downloads')->unsigned()->default(0);
            $table->string('version', 20);
            $table->text('changelog');
            $table->tinyInteger('public')->unsigned()->default(0);
            $table->integer('addon_id')->unsigned();
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
        Schema::dropIfExists('addonfile');
    }
}
