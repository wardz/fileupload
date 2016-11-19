<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use Storage;

use App\Addon;
use App\AddonFile;
use App\Http\Requests\AddonFormRequest;
use Illuminate\Support\Facades\Log;

class AddonUploadController extends Controller
{
    /**
     * Add middlewares on instance created.
     */
    public function __construct()
    {
    	$this->middleware('auth');
        $this->middleware('throttle:10,1');
    }

    public function index()
    {
        return view('addon.index');
    }

    public function create()
    {
        return view('addon.create');
    }

    public function show(Addon $addon)
    {
        $file = $addon->files;
        $path = storage_path() . '/app/' . $file->path;
        ob_end_clean();
        
        return response()->download($path, $file->name,
            array('Content-Type: application/zip'));
    }

    /**
     * Show view for editing existing addon.
     *
     * @param AddonFormRequest $request
     * @return Response
     */
    public function edit(Addon $addon)
    {        
        return view('addon.edit', compact('addon'));
    }

    /**
     * Update existing addon.
     *
     * @param AddonFormRequest $request
     * @param int $id
     * @return Response
     */
    public function update(AddonFormRequest $request, $id)
    {
        $addon = Addon::findOrFail($id);
        $addon->update($request->all());

        $file = $addon->files;
        $file->version = $request->input('version');
        $file->changelog = $request->input('changelog');
        if ($request->hasFile('file')) {
            $reqFile = $request->file('file');
            $file->name = $reqFile->getClientOriginalName();
            $file->path = $reqFile->store('addons/' . $request->user()->id);
            $file->size = $reqFile->getSize();
        }
        $file->saveOrFail();

        return view('addon.index');
    }

    /**
     * Save a new addon.
     *
     * @param AddonFormRequest $request
     * @return Response
     */
    public function store(AddonFormRequest $request)
    {
        $addon = new Addon($request->all());
        Auth::user()->addons()->save($addon);

        $reqFile = $request->file('file');
        $file = new AddonFile();
        $file->name = $reqFile->getClientOriginalName();
        $file->path = $reqFile->store('addons/' . $request->user()->id);
        $file->size = $reqFile->getSize();
        $file->version = $request->input('version');
        $file->changelog = $request->input('changelog');
        $file->addon_id = $addon->id;
        $file->saveOrFail();

        return redirect('addon.index');
    }
}
