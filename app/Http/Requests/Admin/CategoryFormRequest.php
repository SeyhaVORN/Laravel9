<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:200'],
            'description' => ['required'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png'],
            'meta_title' => ['required', 'string'],
            'meta_description' => ['required', 'string'],
            'meta_keyword' => ['required', 'string'],
            'navbar_status' => ['nullable'],
            'status' => ['nullable'],
        ];
        return $rules;
    }

    public function validated($key = null, $default = null)
    {
        $data = parent::validated();
        $data['image'] = $this->handleFileUpload();
        $data['created_by'] = auth()->id();
        return $data;
    }

    public function handleFileUpload()
    {
        if ($this->hasFile('image')) {
            $file = $this->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category', $filename);
            return $filename;
        }

        return null;
    }
}