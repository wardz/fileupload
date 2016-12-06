<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Storage;

class DownloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:30,1');
    }

    public function get(File $file)
    {
        $path = storage_path('app/files/' . $file->file_path);

        // Flush any existing buffers to prevent file corruption
        if (ob_get_level()) {
            ob_end_clean();
        }

        $file->file_downloads += 1;
        $file->update();

        return response()->download($path, $file->file_name,
            ['Content-Type: ' . $file->file_mime]);
    }
}
