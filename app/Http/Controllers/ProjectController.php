<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectFormRequest;

use Storage; // needed?

use App\Project;
use App\File;
use App\tag;

class ProjectController extends Controller
{
    /**
     * Add middlewares on instance created.
     */
    public function __construct()
    {
    	$this->middleware('auth');
        $this->middleware('throttle:10,1');
    }

    /**
     * Show main view.
     * @return Response
     */
    public function index()
    {
        return view('project.index');
    }

    /**
     * Show view for creating new project.
     * @return Response
     */
    public function create()
    {
        $tags = Tag::pluck('name', 'id')->all();

        return view('project.create', compact('tags'));
    }

    /**
     * Show view for editing existing project.
     * $project is reference to Project::findOrFail(routeParams)
     *
     * @param App\Project $project
     * @return Response
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    // TODO move this to diff controller
    // add project page instead here
    public function show(Project $project)
    {
        $file = $project->files;
        $path = storage_path() . '/app/' . $file->file_path;

        // Flush any existing buffers to prevent file corruption
        if (ob_get_level()) {
            ob_end_clean();
        }
        
        return response()->download($path, $file->file_name,
            array('Content-Type: ' . $file->file_mime)); // TODO file_mime
    }

    /**
     * Update existing project.
     *
     * @param ProjectFormRequest $request
     * @param App\Project $project
     * @return Response
     */
    public function update(ProjectFormRequest $request, Project $project)
    {
        $project->update($request->all());

        if ($request->hasFile('file')) {
            $project->files->file_path = $request->file('file')->store($request->user()->id);
        }

        $project->files->update($request->all());

        return view('project.index');
    }

    /**
     * Save a new project.
     *
     * @param ProjectFormRequest $request
     * @return Response
     */
    public function store(ProjectFormRequest $request)
    {
        // Store project
        $project = new Project($request->all());
        $project->tags()->attach($project->id, $request->input('tag_list'));
        $request->user()->projects()->save($project);

        // Store file
        $file = new File($request->all());
        $file->file_path = $request->file('file')->store($request->user()->id);
        $project->files()->save($file);

        return redirect('project.index');
    }
}
