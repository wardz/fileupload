<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectBrowseController extends Controller
{
    public function index()
    {
    	return redirect('project');
    }
}
