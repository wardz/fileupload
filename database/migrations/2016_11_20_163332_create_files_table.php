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
            $table->string('file_path')->unique();
            $table->string('file_version', 20);
            $table->string('file_mime', 127);
            $table->text('file_changelog');
            $table->integer('file_size')->unsigned();
            $table->integer('file_downloads')->unsigned()->default(0);
            $table->integer('project_id')->unsigned();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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

        // Delete whole directory, then create new dir with same path
        // This is used to delete all dummy .zip files used for testing
        $path = storage_path() . '/app/files/';
        self::rrmdir($path);
        mkdir($path, 0777);
        chmod($path, 0777);
    }

    /**
     * Recursively delete non-empty directory.
     * http://php.net/manual/en/function.rmdir.php#98622
     *
     * @param  string $dir
     */
    public function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir") {
                        self::rrmdir($dir."/".$object);
                    } else {
                        unlink($dir."/".$object);
                    }
                }
            }

            reset($objects);
            rmdir($dir);
        }
    }
}
