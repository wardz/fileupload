<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectFormRequest;

use Storage;
use App\Project;
use App\File;
use App\Tag;

class ProjectController extends Controller
{
    /**
     * Add middlewares on instance created.
     */
    public function __construct()
    {
        $this->middleware('throttle:10,1', ['except' => ['show']]);
    	$this->middleware('auth', ['except' => ['show']]);
        $this->middleware('role:owner', ['only' => ['edit']]);
    }

    /**
     * Show view for creating a new project.
     * 
     * @return Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Show view for listing all of user's projects.
     * 
     * @param  App\Project $projects
     * @return Response
     */
    public function index()
    {
        // tmp
        $projects = Project::userIsOwner()->orderBy('name', 'asc')->paginate(8);
        
        return view('project.index', compact('projects'));
    }

    /**
     * Show view for editing existing project.
     *
     * @param App\Project $project
     * @return Response
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Show view for current project.
     * 
     * @param  Project $project
     * @return Response
     */
    public function show(Project $project)
    {
        return view('project.show', compact('project'));
    }

    /**
     * Helper function for storing file locally.
     * @param  ProjectFormRequest $request
     * @return string|null
     */
    public function storeFileLocal($request)
    {
        return $request->file('file')->store($request->user()->id);
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
        $project->tags()->sync($request->input('tag_list'));

        if ($request->hasFile('file')) {
            // Create new file to project
            $file = new File($request->all());
            $file->file_path = $this->storeFileLocal($request);
            $project->files()->save($file);
        } else {
            // Update latest existing file
            $file = $project->files->first();
            if ($file) {
                $file->update($request->all());
            }
        }

        return redirect('project');
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
        $file->file_path = $this->storeFileLocal($request);
        $project->files()->save($file);

        return redirect('project');
    }

    /**
     * Delete existing project.
     *
     * @param ProjectFormRequest $request
     * @return Response
     */
    public function destroy(Project $project)
    {
        foreach ($project->files as $file) {
            $path = $file->file_path;
            if (Storage::exists($path)) {
                Storage::delete($path);
            }
        }
        
        $project->tags()->delete();
        $project->files()->delete();
        $project->delete();

        return redirect('project');
    }
}
