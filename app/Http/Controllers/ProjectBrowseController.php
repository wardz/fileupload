<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectBrowseController extends Controller
{
	public function show($projects)
	{
		return view('projects.show', compact('projects'));
	}

    public function index()
    {
    	return redirect('projects/all');
    }
}
