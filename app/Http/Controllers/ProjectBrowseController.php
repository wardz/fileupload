<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Responsible for viewing other user's projects
// search, sort, paginate, etc
class ProjectBrowseController extends Controller
{
    public function index()
    {
    	return redirect('project');
    }
}
