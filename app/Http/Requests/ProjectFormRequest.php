<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Project;
use File;

class ProjectFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()) {
            if ($this->route('project')) {
                return ($this->route('project')->userOwned());
            }

            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'          => 'required|string|max:32|min:3|unique:projects,name',
            'license'       => 'string|max:50|min:2',
            'tag_list'      => 'required|array',
            'description'   => 'required|string|max:999|min:10',

            'file'              => 'required|file|mimes:zip|max:102400|min:1',
            'file_version'      => 'required|string|max:20|min:1',
            'file_changelog'    => 'required|string|max:999|min:10'
        ];

        if ($this->isMethod('patch')) {
            // Prevent "Name is already taken" when updating project. (unique)
            $rules['name'] .= ',' . $this->route('project')->id;
            
            // File is optional when updating a project
            $rules['file'] = str_replace('required|', '', $rules['file']);
        }

        return $rules;
    }

    /** 
     * Intercept request before passing to controller and inject file properties.
     */
    public function all()
    {
        if ($this->file('file')) {
            $path = $this->file('file')->getPathName();

            $this['file_name'] = $this->file('file')->getClientOriginalName();
            $this['file_size'] = File::size($path);
            $this['file_mime'] = File::mimeType($path);
        }

        return parent::all();
    }
}
