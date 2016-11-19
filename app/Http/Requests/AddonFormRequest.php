<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Addon;
use Auth;

class AddonFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()) {
            //$this['user_id'] = $this->user()->id;

            if ($this->route('addon')) {
                if (!Addon::userIsOwner()->where('id', '=', $this->route('addon'))->firstOrFail()) {
                    return false;
                }
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
            'name'          => 'required|string|max:32|min:3|unique:addon,name',
            'author'        => 'string|max:20|min:2',
            'license'       => 'string|max:50|min:2',
            'category_id'   => 'required|numeric|max:33|min:1',
            'description'   => 'required|string|max:500|min:10',

            'file'          => 'required|file|mimes:zip|max:102400|min:1',
            'version'       => 'required|string|max:20|min:1',
            'changelog'     => 'required|string|max:500|min:10'
        ];

        if ($this->isMethod('patch')) {
            $rules['name'] = $rules['name'] . ',' . $this->route('addon');
            $rules['file'] = 'file|mimes:zip|max:102400|min:1';
        }

        return $rules;
    }
}
