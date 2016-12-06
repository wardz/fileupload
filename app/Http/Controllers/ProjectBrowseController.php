<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

// Responsible for viewing other user's projects
// search, sort, paginate, etc
class ProjectBrowseController extends Controller
{
	public function show($projects)
	{
		return view('projects.show', compact('projects'));
	}

    public function index()
    {
    	return view('projects.index');
    }
}
