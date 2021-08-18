<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'description' => 'max:300',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('index.name_required'),
            'name.max' => __('index.name_length_limit'),
            'description.max' => __('index.description_length_limit'),
        ];
    }
}
