<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'category_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'description' => ['required'],
            'yt_iframe' => ['nullable', 'string'],
            'meta_title' => ['required', 'string'],
            'meta_description' => ['nullable', 'string'],
            'meta_keyword' => ['nullable', 'string'],
            'status' => ['nullable'],
        ];

        return $rules;
    }
    public function validated($key = null, $default = null)
    {
        $data = parent::validated();
        $data['created_by'] = auth()->id();
        return $data;
    }
}