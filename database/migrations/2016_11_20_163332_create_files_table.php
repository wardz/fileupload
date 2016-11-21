<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name', 50)->index();
            $table->string('file_path', 257)->unique();
            $table->string('file_version', 20);
            $table->string('file_mime', 127);
            $table->text('file_changelog');
            $table->integer('file_size')->unsigned();
            $table->integer('file_downloads')->unsigned()->default(0);
            $table->tinyInteger('file_public')->unsigned()->default(0);
            $table->integer('project_id')->unsigned();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
