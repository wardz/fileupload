<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectFormRequest;

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
    	$this->middleware('auth');
        $this->middleware('throttle:10,1');
    }

    /**
     * Show view for creating new project.
     * @return Response
     */
    public function create()
    {
        $tags = Tag::remember(1)->pluck('name', 'id')->all();

        return view('project.create', compact('tags'));
    }

    public function index(Request $request)
    {
        $column = $request->get('column');
        if (!$column || $column !== 'name' || $column !== 'updated_at') {
            $column = 'name';
        }

        $projects = Project::remember(1)->userIsOwner()->orderBy($column, 'desc')->paginate(8);
        
        return view('project.index', compact('projects'));
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
        $tags = Tag::remember(1)->pluck('name', 'id')->all();

        return view('project.edit', compact('project', 'tags'));
    }

    public function show(Project $project, Request $request)
    {
        return view('project.show', compact('project'));
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
            $request['file_path'] = $request->file('file')->store($request->user()->id);
            $project->files()->save($request->all());
        } else {
            $file = $project->files->first();
            $file->update($request->all());
        }

        return redirect('project.index');
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
